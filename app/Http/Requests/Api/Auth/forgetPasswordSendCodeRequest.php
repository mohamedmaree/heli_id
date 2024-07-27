<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Http\Request;

class forgetPasswordSendCodeRequest extends BaseApiRequest
{
    public function __construct(Request $request) {
        $request['phone']        = fixPhone($request['phone']);
        $request['country_code'] = fixPhone($request['country_code']);
    }

    public function rules() {
    return [
        'country_code' => 'required|exists:users,country_code',
        'phone'        => 'required|exists:users,phone',
    ];
    }
}
