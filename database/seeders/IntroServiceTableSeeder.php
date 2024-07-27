<?php
namespace Database\Seeders;

use App\Models\IntroService;
use Illuminate\Database\Seeder;
use DB;

class IntroServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intro_services')->insert([
            [
                'title'        => json_encode( ['ar' => 'اسم الخدمة الاولي' , 'en' => 'first service name' ], JSON_UNESCAPED_UNICODE),
                'short_description'  => json_encode( ['ar' => 'وصف الخدمه وصف الخدمه وصف الخدمهوصف الخدمهوصف الخدمهوصف الخدمه وصف الخدمه وصف الخدمه  الاولي' , 'en' => 'first service title service title service title service title service title service title service title service title service title '], JSON_UNESCAPED_UNICODE),
                'description'  => json_encode( ['ar' => 'وصف الخدمه وصف الخدمه وصف الخدمهوصف الخدمهوصف الخدمهوصف الخدمه وصف الخدمه وصف الخدمه  الاولي' , 'en' => 'first service title service title service title service title service title service title service title service title service title '], JSON_UNESCAPED_UNICODE),
                'icon'  => 'ri-pie-chart-line',
            ],[
                'title'        => json_encode( ['ar' => 'اسم الخدمة الثانية' , 'en' => 'secound service name' ], JSON_UNESCAPED_UNICODE),
                'short_description'  => json_encode( ['ar' => 'وصف الخدمه وصف الخدمه وصف الخدمهوصف الخدمهوصف الخدمهوصف الخدمه وصف الخدمه وصف الخدمه  الثانية' , 'en' => 'secound service title service title service title service title service title service title service title service title service title '], JSON_UNESCAPED_UNICODE),
                'description'  => json_encode( ['ar' => 'وصف الخدمه وصف الخدمه وصف الخدمهوصف الخدمهوصف الخدمهوصف الخدمه وصف الخدمه وصف الخدمه  الثانية' , 'en' => 'secound service title service title service title service title service title service title service title service title service title '], JSON_UNESCAPED_UNICODE),
                'icon'  => 'ri-stack-line',
            ],[
                'title'        => json_encode( ['ar' => 'اسم الخدمة الثالثة' , 'en' => 'third service name' ], JSON_UNESCAPED_UNICODE),
                'short_description'  => json_encode( ['ar' => 'وصف الخدمه وصف الخدمه وصف الخدمهوصف الخدمهوصف الخدمهوصف الخدمه وصف الخدمه وصف الخدمه  الثالثة' , 'en' => 'third service title service title service title service title service title service title service title service title service title '], JSON_UNESCAPED_UNICODE),
                'description'  => json_encode( ['ar' => 'وصف الخدمه وصف الخدمه وصف الخدمهوصف الخدمهوصف الخدمهوصف الخدمه وصف الخدمه وصف الخدمه  الثالثة' , 'en' => 'third service title service title service title service title service title service title service title service title service title '], JSON_UNESCAPED_UNICODE),
                'icon'  => 'ri-markup-line',
            ],[
                'title'        => json_encode( ['ar' => 'اسم الخدمة الرابعة' , 'en' => 'fourth service name' ], JSON_UNESCAPED_UNICODE),
                'short_description'  => json_encode( ['ar' => 'وصف الخدمه وصف الخدمه وصف الخدمهوصف الخدمهوصف الخدمهوصف الخدمه وصف الخدمه وصف الخدمه  الرابعة' , 'en' => 'fourth service title service title service title service title service title service title service title service title service title '], JSON_UNESCAPED_UNICODE),
                'description'  => json_encode( ['ar' => 'وصف الخدمه وصف الخدمه وصف الخدمهوصف الخدمهوصف الخدمهوصف الخدمه وصف الخدمه وصف الخدمه  الرابعة' , 'en' => 'fourth service title service title service title service title service title service title service title service title service title '], JSON_UNESCAPED_UNICODE),
                'icon'  => 'ri-shape-line',
            ],[
                'title'        => json_encode( ['ar' => 'اسم الخدمة الخامسة' , 'en' => 'fivth service name' ], JSON_UNESCAPED_UNICODE),
                'short_description'  => json_encode( ['ar' => 'وصف الخدمه وصف الخدمه وصف الخدمهوصف الخدمهوصف الخدمهوصف الخدمه وصف الخدمه وصف الخدمه  الخامسة' , 'en' => 'fivth service title service title service title service title service title service title service title service title service title '], JSON_UNESCAPED_UNICODE),
                'description'  => json_encode( ['ar' => 'وصف الخدمه وصف الخدمه وصف الخدمهوصف الخدمهوصف الخدمهوصف الخدمه وصف الخدمه وصف الخدمه  الخامسة' , 'en' => 'fivth service title service title service title service title service title service title service title service title service title '], JSON_UNESCAPED_UNICODE),
                'icon'  => 'ri-fingerprint-line',
            ],[
                'title'        => json_encode( ['ar' => 'اسم الخدمة السادسة' , 'en' => 'sexth service name' ], JSON_UNESCAPED_UNICODE),
                'short_description'  => json_encode( ['ar' => 'وصف الخدمه وصف الخدمه وصف الخدمهوصف الخدمهوصف الخدمهوصف الخدمه وصف الخدمه وصف الخدمه  السادسة' , 'en' => 'sexth service title service title service title service title service title service title service title service title service title '], JSON_UNESCAPED_UNICODE),
                'description'  => json_encode( ['ar' => 'وصف الخدمه وصف الخدمه وصف الخدمهوصف الخدمهوصف الخدمهوصف الخدمه وصف الخدمه وصف الخدمه  السادسة' , 'en' => 'sexth service title service title service title service title service title service title service title service title service title '], JSON_UNESCAPED_UNICODE),
                'icon'  => 'ri-body-scan-line',
            ]
        ]);
    }
}
