<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\BaseApiRequest;
class updateDevicesRequest extends BaseApiRequest
{
    public function rules() {
        return [
            'device_id'   => 'required|max:250',
            'device_type' => 'required|in:ios,android,web',
        ];
    }
}
