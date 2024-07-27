<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Services\SettingService;
use App\Http\Requests\Site\Auth\RemoveAccountRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
class LoginController extends Controller
{
    public function removeAccountForm(){
        $data = SettingService::appInformations(SiteSetting::pluck('value', 'key'));
        return view('intro_site.removeAccountForm', compact('data'));
    }

    public function removeAccount(RemoveAccountRequest $request){

        if($this->checkTooManyFailedAttempts()){
            return $this->checkTooManyFailedAttempts();
        }
    
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            RateLimiter::clear($this->throttleKey());
            auth()->user()->delete();
            return response()->json(['status' => 1, 'message' => __('site.deleted'),'url'=>route('remove-account-form')]);
        } else {
          RateLimiter::hit($this->throttleKey(), $seconds = 3600);
          return response()->json(['status' => 0, 'message' => __('admin.incorrect_password')]);
        }

    }

    public function throttleKey()
    {
        return Str::lower(request('email')) . '|' . request()->ip();
    }
    public function checkTooManyFailedAttempts()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 10)) {
            return;
        }
        return response()->json(['status' => 0 ,'message' => 'IP address banned. Too many login attempts, try after 60 minute' ]);
    }
}
