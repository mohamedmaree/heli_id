<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Http\Request;

class LoginRequest extends BaseApiRequest {
  
  public function __construct(Request $request) {
    $request['phone']        = fixPhone($request['phone']);
    $request['country_code'] = fixPhone($request['country_code']);
  }

  public function rules() {
    return [
      'country_code' => 'required|numeric|digits_between:2,5',
      'phone'        => 'required|numeric|digits_between:8,10|exists:users,phone,deleted_at,NULL',
      //'email'       => 'required|email|exists:users,email|max:50',
      'password'    => 'required|min:6|max:100',
      'device_id'   => 'required|max:250',
      'device_type' => 'required|in:ios,android,web',
    ];
  }
}
