<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\BaseApiRequest;

class changeEmailCheckCodeRequest extends BaseApiRequest
{
    public function rules() {
        return [
            'code' => 'required',
        ];
    }
}
