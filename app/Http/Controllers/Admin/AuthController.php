<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\loginRequest;
use App\Http\Requests\Admin\Auth\ForgetPasswordRequest;
use App\Http\Requests\Admin\Auth\ResetPasswordRequest;


use App\Models\SiteSetting;
use App\Models\Admin;
use App\Services\SettingService;
use App\Traits\AdminFirstRouteTrait;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AuthController extends Controller {
  use AdminFirstRouteTrait;
  public function SetLanguage($lang) {
    if (in_array($lang, languages())) {

      if (session()->has('lang')) {
        session()->forget('lang');
      }
      session()->put('lang', $lang);
    } else {
      if (session()->has('lang')) {
        session()->forget('lang');
      }
      session()->put('lang', 'ar');
    }
    return back();
  }

  public function showLoginForm() {
    $data = SettingService::appInformations(SiteSetting::pluck('value', 'key'));
    return view('admin.auth.login2', compact('data'));
  }

  public function login(loginRequest $request) {
    if($this->checkTooManyFailedAttempts()){
        return $this->checkTooManyFailedAttempts();
    }

    $remember = 1 == $request->remember ? true : false;
    if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password , 'is_blocked' => 0], $remember)) {
        
        RateLimiter::clear($this->throttleKey());

        session()->put('lang', 'ar');
        return response()->json(['status' => 'login', 'url' => route($this->getAdminFirstRouteName()), 'message' => __('admin.login_successfully_logged')]);

    } else {
      if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
          auth('admin')->logout() ;
        return response()->json(['status' => 0, 'message' => __('auth.blocked')]);
      }

      RateLimiter::hit($this->throttleKey(), $seconds = 3600);
      return response()->json(['status' => 0, 'message' => __('admin.incorrect_password')]);
    }
  }

  public function showForgetPasswordForm() {
    $data = SettingService::appInformations(SiteSetting::pluck('value', 'key'));
    return view('admin.auth.forget_password', compact('data'));
  }

  public function forgetPassword(ForgetPasswordRequest $request) {
    $admin = Admin::where($request->validated())->first();
    $admin->sendVerificationCode();
    return response()->json(['status'=>'success','message'=>__('admin.code_send'),'url' => route('admin.show.reset-password',[$admin->id])]);
  }

  public function showResetPasswordForm($user_id) {
    $data = SettingService::appInformations(SiteSetting::pluck('value', 'key'));
    return view('admin.auth.reset_password', get_defined_vars());
  }

  public function resetPassword(ResetPasswordRequest $request) {
      $admin = Admin::where(['id' => $request->user_id , 'email' => $request->email])->first();
      if ($request->code == $admin->code) {
          $admin->update(['code' => null, 'password' => $request->password]);
          return response()->json(['status' => 'success','message' =>  __('admin.passwordChanges'),'url' => route('admin.show.login')]);
      } else {
          return response()->json(['status' => 'fail','message' =>  __('admin.code_wrong')]);
      }
  }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::lower(request('email')) . '|' . request()->ip();
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     */
    public function checkTooManyFailedAttempts()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 10)) {
            return;
        }
        return response()->json(['status' => 0 ,'message' => 'IP address banned. Too many login attempts, try after 60 minute' ]);
    }

  public function logout() {
    auth('admin')->logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect(route('admin.login'));
  }
}
