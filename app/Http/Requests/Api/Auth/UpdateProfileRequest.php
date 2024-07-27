<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Http\Request;

class UpdateProfileRequest extends BaseApiRequest {
  public function __construct(Request $request) {
    if($request['phone']){
      $request['phone']        = fixPhone($request['phone']);
    }
    if($request['country_code']){
      $request['country_code'] = fixPhone($request['country_code']);
    }

    // if ($request['phone'] && auth()->user()->phone !== $request['phone']) {
    //   $request['active'] = false;
    // }

  }

  public function rules() {
    return [
      'country_code' => 'sometimes|required|numeric|digits_between:2,5',
      'phone'        => 'sometimes|required|numeric|digits_between:7,9|unique:users,phone,'.auth()->id().',id,deleted_at,NULL',
      'email'        => 'sometimes|required|email|max:50|unique:users,email,'.auth()->id().',id,deleted_at,NULL',
      // 'active'       => '',
      'image'        => 'nullable',
    ];
  }



}
