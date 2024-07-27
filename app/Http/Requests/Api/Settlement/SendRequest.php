<?php

namespace App\Http\Requests\Api\Settlement;

use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Http\Request;

class SendRequest extends BaseApiRequest {

    public function rules() {
        return [
            'amount'         => 'nullable|numeric',
        ];
    }
}
