<?php

namespace App\Http\Requests\Admin\coupons;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'coupon_num'              => 'required|unique:coupons,coupon_num,'.$this->id,
            'max_use'                 => 'required|numeric',
            'discount'              => 'required|numeric',
            'max_discount'          => 'required|numeric',
            'expire_date'           => 'required|after:'.\Carbon\Carbon::now(),
            'start_date'            => 'required|after:'.\Carbon\Carbon::now(),
            'type'                  => 'required|in:ratio,number',
        ];
    }

    public function messages()
    {
        return[
            'coupon_num.unique' => __('admin.coupon_number_used_before'),
        ];
    }
}
