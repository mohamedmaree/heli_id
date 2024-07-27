<?php
namespace App\Services;

use App\Models\Coupon;

class CouponService {

    static function checkCoupon($coupon_num, $total_price = null ){
        if(!$coupon = Coupon::whereCouponNum($coupon_num)->first()){
            return [ 'msg' => __('apis.not_avilable_coupon') , 'key' => 'fail' ];
        }
        if ($coupon->status == 'closed' ) {
            return [ 'msg' => __('apis.not_avilable_coupon') , 'key' => 'fail' ];
        }
        if ($coupon->status == 'usage_end' || $coupon->max_use <= $coupon->use_times) {
            return [ 'msg' => __('apis.max_usa_coupon') , 'key' => 'fail' ];
        }

        if ($coupon->expire_date < date('Y-m-d') || $coupon->status == 'expire' ) {
            return [ 'msg' => __('apis.coupon_end_at' , ['date' =>  date('d-m-Y  h:i A', strtotime($coupon->expire_date)) ]) , 'key' => 'fail' ];
        }

        if ($coupon->start_date > date('Y-m-d H:i:s')  ) {
            return [ 'msg' => __('apis.coupon_start_at' , ['date' =>  date('d-m-Y  h:i A', strtotime($coupon->start_date)) ]) , 'key' => 'fail' ];
        }

        if ('ratio' == $coupon->type) {
            $disc_amount = $coupon->discount * $total_price / 100;
            if ($disc_amount > $coupon->max_discount) {
                $disc_amount = $coupon->max_discount;
            }
        } else {
            $disc_amount = $coupon->discount;
        }


        return [
            'msg' => __('apis.disc_amount') . ' ' . $disc_amount,
            'key' => 'success',
            'data' => [
                'disc_amount' => number_format($disc_amount,2),
                'final_price' => number_format($total_price - $disc_amount,2),
                'coupon' => $coupon->only(['type', 'discount', 'id'])
            ]
        ];
    }
}