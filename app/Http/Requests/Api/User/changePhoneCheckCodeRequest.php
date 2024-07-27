<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\BaseApiRequest;
class changePhoneCheckCodeRequest extends BaseApiRequest
{
    public function rules() {
        return [
            'code' => 'required',
        ];
    }
}
