<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordRequest extends BaseApiRequest {

  public function rules() {
    return [
      'password'     => 'required|min:6|max:100',
      'old_password' => 'required|min:6|max:100',
    ];
  }

  public function withValidator($validator) {
    $validator->after(function ($validator) {
      if ($this->has('old_password') && !Hash::check($this->old_password, auth()->user()->password)) {
        $validator->errors()->add('old_password', trans('auth.incorrect_old_pass'));
      }
    });
  }

}
