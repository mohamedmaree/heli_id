<?php

namespace App\Http\Requests\Api\Coupon;

use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class checkCouponRequest extends BaseApiRequest
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
            'coupon_num'   => 'required|exists:coupons,coupon_num' ,
            'total_price'  => 'required|numeric' ,
        ];
    }
}
