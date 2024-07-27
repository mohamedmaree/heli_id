<?php
namespace Database\Seeders;


use App\Models\Coupon;
use Illuminate\Database\Seeder;
use DB;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coupons')->insert([
            [
                'coupon_num'      => 'QWERT' , 
                'type'          => 'ratio',
                'discount'      => 10,
                'max_discount'  => 20,
                'max_use'         => 100,
                'use_times'   => 40,
                'status'        => 'available',
                'start_date'   => \Carbon\Carbon::now()->addDays(2),
                'expire_date'   => \Carbon\Carbon::now()->addDays(10),
            ] , [
                'coupon_num'      => 'JAKA' , 
                'type'          => 'number',
                'discount'      => 20,
                'max_discount'  => 20,
                'max_use'         => 100,
                'use_times'   => 40,
                'status'        => 'available',
                'start_date'   => \Carbon\Carbon::now()->addDays(2),
                'expire_date'   => \Carbon\Carbon::now()->addDays(10),
            ] , [
                'coupon_num'      => 'UsageEnd' , 
                'type'          => 'ratio',
                'discount'      => 10,
                'max_discount'  => 20,
                'max_use'         => 100,
                'use_times'   => 100,
                'status'        => 'usage_end',
                'start_date'   => \Carbon\Carbon::now(),
                'expire_date'   => \Carbon\Carbon::now()->addDays(1),
            ] , [
                'coupon_num'      => 'Expire' , 
                'type'          => 'number',
                'discount'      => 10,
                'max_discount'  => 10,
                'max_use'         => 100,
                'use_times'   => 10,
                'status'        => 'expire',
                'start_date'   => \Carbon\Carbon::now(),
                'expire_date'   => \Carbon\Carbon::now(),
            ]
        ]);
    }
}
