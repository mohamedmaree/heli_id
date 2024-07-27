<?php
namespace Database\Seeders;

use App\Models\SMS;
use Illuminate\Database\Seeder;
use DB;

class SmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('s_m_s')->insert([
            [
                'name'        => 'باقة يمامة',
                'key'         => 'yamamah',
                'sender_name' => "sender_name",
                'user_name'   => 'user_name',
                'password'    => '123456',
                'active'      => 1 ,
            ],[
                'name'        => 'باقة فور جوالي',
                'key'         => '4jawaly',
                'sender_name' => "sender_name",
                'user_name'   => 'user_name',
                'password'    => '123456',
                'active'      => 0 ,
            ],[
                'name'        => 'باقة gateway',
                'key'         => 'gateway',
                'sender_name' => "sender_name",
                'user_name'   => 'user_name',
                'password'    => '123456',
                'active'      => 0 ,
            ],[
                'name'        => 'باقة hisms',
                'key'         => 'hisms',
                'sender_name' => "sender_name",
                'user_name'   => 'user_name',
                'password'    => '123456',
                'active'      => 0 ,
            ],[
                'name'        => 'باقة مسجات',
                'key'         => 'msegat',
                'sender_name' => "sender_name",
                'user_name'   => 'user_name',
                'password'    => '123456',
                'active'      => 0 ,
            ],[
                'name'        => 'باقة oursms',
                'key'         => 'oursms',
                'sender_name' => "sender_name",
                'user_name'   => 'user_name',
                'password'    => '123456',
                'active'      => 0 ,
            ],[
                'name'        => 'باقة unifonic',
                'key'         => 'unifonic',
                'sender_name' => "sender_name",
                'user_name'   => 'user_name',
                'password'    => '123456',
                'active'      => 0 ,
            ],[
                'name'        => 'باقة زين',
                'key'         => 'zain',
                'sender_name' => "sender_name",
                'user_name'   => 'user_name',
                'password'    => '123456',
                'active'      => 0 ,
            ]
        ]);
    }
}
