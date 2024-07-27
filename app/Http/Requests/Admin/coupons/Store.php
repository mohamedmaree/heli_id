<?php

namespace App\Http\Requests\Admin\coupons;

use Illuminate\Foundation\Http\FormRequest;

class store extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'coupon_num'              => 'required|unique:coupons,coupon_num',
            'max_use'                 => 'required|numeric',
            'discount'              => 'required|numeric',
            'max_discount'          => 'required|numeric',
            'start_date'            => 'required|after:'.\Carbon\Carbon::now(),
            'expire_date'           => 'required|after:'.\Carbon\Carbon::now(),
            'type'                  => 'required|in:ratio,number',
        ] ;
    }

    public function messages()
    {
        return[
            'coupon_num.unique' => __('admin.coupon_number_used_before') ,
        ];
    }
}
