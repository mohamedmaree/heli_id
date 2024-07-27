<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class changeEmailSendCodeRequest extends FormRequest
{
    public function rules() {
        return [
            'email'        => 'required|unique:users,email',
        ];
    }
}
