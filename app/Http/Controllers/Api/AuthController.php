<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\ActivateRequest;
use App\Http\Requests\Api\Auth\changePhoneSendCodeRequest;
use App\Http\Requests\Api\Auth\ForgetPasswordRequest;
use App\Http\Requests\Api\Auth\forgetPasswordSendCodeRequest;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Requests\Api\Auth\ResendCodeRequest;
use App\Http\Requests\Api\Auth\StoreComplaintRequest;
use App\Http\Requests\Api\Auth\UpdatePasswordRequest;
use App\Http\Requests\Api\Auth\UpdateProfileRequest;
use App\Http\Requests\Api\User\changeEmailCheckCodeRequest;
use App\Http\Requests\Api\User\changeEmailSendCodeRequest;
use App\Http\Requests\Api\User\changePhoneCheckCodeRequest;
use App\Http\Resources\Api\Notifications\NotificationsCollection;
use App\Http\Resources\Api\UserResource;
use App\Models\Complaint;
use App\Models\User;
use App\Models\UserUpdate;
use App\Models\Device;
use App\Traits\GeneralTrait;
use App\Traits\ResponseTrait;
use App\Traits\SmsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\User\updateDevicesRequest;

class AuthController extends Controller {
    use ResponseTrait, SmsTrait, GeneralTrait;

    public function register(RegisterRequest $request) {
        $user = User::create($request->validated());
        $user->sendVerificationCode();
        $userData = new UserResource($user->refresh());
        return $this->response('success', __('auth.registered'), $userData);
    }

    public function activate(ActivateRequest $request) {
        if (!$user = User::where('phone', $request['phone'])
            ->where('country_code', $request['country_code'])
            ->first()) {

            return $this->failMsg(__('auth.failed'));
        }

        if (!$this->isCodeCorrect($user, $request->code)) {
            return $this->failMsg(trans('auth.code_invalid'));
        }

        return $this->response('success', __('auth.activated'),$user->markAsActive()->login());
    }

    public function resendCode(ResendCodeRequest $request) {
        if (!$user = User::where('phone', $request['phone'])
            ->where('country_code', $request['country_code'])
            ->first()) {

            return $this->failMsg(__('auth.failed'));
        }
        $user->sendVerificationCode();

        return $this->response('success', __('auth.code_re_send'));
    }

    public function login(LoginRequest $request) {
        if (!$user = User::where('phone', $request['phone'])
            ->where('country_code', $request['country_code'])
            ->first()) {

            return $this->failMsg(__('auth.failed'));
        }

        if (!Hash::check($request->password, $user->password)) {
            return $this->failMsg(__('auth.failed'));
        }

        if ($user->is_blocked) {
            return $this->blockedReturn($user);
        }

        if (!$user->active) {
            return $this->phoneActivationReturn($user);
        }

        return $this->response('success', __('apis.signed'), $user->login());
    }

    public function logout(Request $request) {
        if ($request->bearerToken()) {
            $user = Auth::guard('sanctum')->user();
            if ($user) {
                $user->logout();
            }
        }

        return $this->response('success', __('apis.loggedOut'));
    }

    public function getProfile(Request $request) {
        $user         = auth()->user();
        $requestToken = ltrim($request->header('authorization'), 'Bearer ');
        $userData     = UserResource::make($user)->setToken($requestToken);
        return $this->successData($userData);
    }

    public function updateProfile(UpdateProfileRequest $request) {
        $user = auth()->user();
        $user->update($request->validated());
        $requestToken = ltrim($request->header('authorization'), 'Bearer ');
        $userData     = UserResource::make($user->refresh())->setToken($requestToken);
        if (!$user->active) {
            return $this->phoneActivationReturn($user);
        }
        return $this->response('success', __('apis.updated'), $userData);
    }

    public function updatePassword(UpdatePasswordRequest $request) {
        $user = auth()->user();
        $user->update($request->validated());
        return $this->successMsg(__('apis.updated'));
    }

    public function forgetPasswordSendCode(forgetPasswordSendCodeRequest $request) {
        if (!$user = User::where('phone', $request['phone'])
            ->where('country_code', $request['country_code'])
            ->first()) {

            return $this->failMsg(__('auth.failed'));
        }
        if (!$user) {
            return $this->failMsg(trans('site.user_wrong'));
        }
        $user->sendVerificationCode();
        // UserUpdate::updateOrCreate(['user_id' => $user->id, 'type' => 'password'], ['code' => '']);
        return $this->successMsg(__('apis.success'));
    }

    public function resetPassword(ForgetPasswordRequest $request) {
        if (!$user = User::where('phone', $request['phone'])
            ->where('country_code', $request['country_code'])
            ->first()) {

            return $this->failMsg(__('auth.failed'));
        }

        // $update = UserUpdate::where(['user_id' => $user->id , 'type' => 'password' , 'code' => $request->code])->first() ;
        // if (!$update) {
        //   return $this->failMsg(trans('auth.code_invalid'));
        // }

        if (!$this->isCodeCorrect($user, $request->code)) {
            return $this->failMsg(trans('auth.code_invalid'));
        }

        $user->update(['password' => $request->password, 'code' => null, 'code_expire' => null]);
        return $this->successMsg(trans('auth.password_changed'));
    }

    public function changeLang(Request $request) {
        $user = auth()->user();
        $lang = in_array($request->lang, languages()) ? $request->lang : 'ar';
        $user->update(['lang' => $lang]);
        App::setLocale($lang);
        return $this->successMsg(__('apis.updated'));
    }

    public function switchNotificationStatus() {
        $user = auth()->user();
        $user->update(['is_notify' => !$user->is_notify]);
        return $this->response('success', __('apis.updated'), ['notify' => (bool) $user->refresh()->is_notify]);
    }

    public function getNotifications() {
        auth()->user()->unreadNotifications->markAsRead();
        $notifications = new NotificationsCollection(auth()->user()->notifications()->paginate($this->paginateNum()));
        return $this->successData(['notifications' => $notifications]);
    }

    public function countUnreadNotifications() {
        return $this->successData(['count' => auth()->user()->unreadNotifications->count()]);
    }

    public function deleteNotification($notification_id) {
        auth()->user()->notifications()->where('id', $notification_id)->delete();
        return $this->successMsg(__('site.notify_deleted'));
    }

    public function deleteNotifications() {
        auth()->user()->notifications()->delete();
        return $this->successMsg(__('apis.deleted'));
    }

    public function StoreComplaint(StoreComplaintRequest $Request) {
        Complaint::create($Request->validated() + (['user_id' => auth()->id()]));
        return $this->successMsg(__('apis.complaint_send'));
    }

    public function changePhoneSendCode(changePhoneSendCodeRequest $request) {
        $update = UserUpdate::updateOrCreate([
            'user_id'      => auth()->id(),
            'type'         => 'phone',
            'country_code' => $request->country_code,
            'phone'        => $request->phone,
        ], [
            'code' => '',
        ])->refresh();
        auth()->user()->sendCodeAtSms($update->code, $update->full_phone);
        return $this->successMsg(__('apis.success'));
    }

    public function changePhoneCheckCode(changePhoneCheckCodeRequest $request) {
        $update = UserUpdate::where(['user_id' => auth()->id(), 'type' => 'phone', 'code' => $request->code])->first();
        if (!$update) {
            return $this->failMsg(trans('auth.code_invalid'));
        }
        auth()->user()->update(['phone' => $update->phone, 'country_code' => $update->country_code]);
        $update->delete();
        return $this->successMsg(__('apis.success'));
    }

    public function changeEmailSendCode(changeEmailSendCodeRequest $request) {
        UserUpdate::updateOrCreate([
            'user_id' => auth()->id(),
            'type'    => 'email',
            'email'   => $request->email,
        ], [
            'code' => '',
        ]);
        return $this->successMsg(__('apis.success'));
    }

    public function changeEmailCheckCode(changeEmailCheckCodeRequest $request) {
        $update = UserUpdate::where(['user_id' => auth()->id(), 'type' => 'email', 'code' => $request->code])->first();
        if (!$update) {
            return $this->failMsg(trans('auth.code_invalid'));
        }
        auth()->user()->update(['email' => $update->email]);
        $update->delete();
        return $this->successMsg(__('apis.success'));
    }

    public function updateDevices(updateDevicesRequest $request) {
        if(auth()->check()){
          auth()->user()->updateUserDevice();
        }else{
          Device::create([
            'device_id'   => request()->device_id,
            'device_type' => request()->device_type,
          ]);
        }
        return $this->successMsg(__('apis.updated'));
    }
      
    public function deleteAccount() {
        // if there any delete conditions write it here
        auth()->user()->delete();
        return $this->successMsg(__('auth.account_deleted'));
    }

}
