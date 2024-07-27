<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{


    public function rules()
    {
        return [
            'code'         => 'required|max:10',
            'email'        => 'required|email|exists:admins,email',
            'user_id'      => 'required|exists:admins,id',
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
        ];
    }
}
