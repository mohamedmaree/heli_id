<?php
namespace Database\Seeders;

use App\Models\IntroPartener;
use Illuminate\Database\Seeder;
use DB;

class IntroPartenerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intro_parteners')->insert([
            [
                'name'              => json_encode( ['ar' => 'محمد علي' , 'en' => 'mohamed ali' ], JSON_UNESCAPED_UNICODE),
                'job'               => json_encode( ['ar' => 'web designer' , 'en' => 'مصمم ويب' ], JSON_UNESCAPED_UNICODE),
                'opinion'  => json_encode( ['ar' => 'عمل مميز جدا ونتمني مزيد من التعاون عمل مميز جدا ونتمني مزيد من التعاون' , 'en' => 'Very special work and we hope for more cooperation Very special work and we hope for more cooperation'], JSON_UNESCAPED_UNICODE),
                'image'    => '1.png',
            ],
            [
                'name'              => json_encode( ['ar' => 'محمد علي' , 'en' => 'mohamed ali' ], JSON_UNESCAPED_UNICODE),
                'job'               => json_encode( ['ar' => 'web designer' , 'en' => 'مصمم ويب' ], JSON_UNESCAPED_UNICODE),
                'opinion'  => json_encode( ['ar' => 'عمل مميز جدا ونتمني مزيد من التعاون عمل مميز جدا ونتمني مزيد من التعاون', 'en' => 'Very special work and we hope for more cooperation Very special work and we hope for more cooperation'], JSON_UNESCAPED_UNICODE),
                'image'    => '2.png',
            ],
            [
                'name'              => json_encode( ['ar' => 'محمد علي' , 'en' => 'mohamed ali' ], JSON_UNESCAPED_UNICODE),
                'job'               => json_encode( ['ar' => 'web designer' , 'en' => 'مصمم ويب' ], JSON_UNESCAPED_UNICODE),
                'opinion'  => json_encode( ['ar' => 'عمل مميز جدا ونتمني مزيد من التعاون عمل مميز جدا ونتمني مزيد من التعاون' , 'en' => 'Very special work and we hope for more cooperation Very special work and we hope for more cooperation'], JSON_UNESCAPED_UNICODE),
                'image'    => '3.png',
            ],
            [
                'name'              => json_encode( ['ar' => 'محمد علي' , 'en' => 'mohamed ali' ], JSON_UNESCAPED_UNICODE),
                'job'               => json_encode( ['ar' => 'web designer' , 'en' => 'مصمم ويب' ], JSON_UNESCAPED_UNICODE),
                'opinion'  => json_encode( ['ar' => 'عمل مميز جدا ونتمني مزيد من التعاون عمل مميز جدا ونتمني مزيد من التعاون' , 'en' => 'Very special work and we hope for more cooperation Very special work and we hope for more cooperation'], JSON_UNESCAPED_UNICODE),
                'image'    => '4.png',
            ],
            [
                'name'              => json_encode( ['ar' => 'محمد علي' , 'en' => 'mohamed ali' ], JSON_UNESCAPED_UNICODE),
                'job'               => json_encode( ['ar' => 'web designer' , 'en' => 'مصمم ويب' ], JSON_UNESCAPED_UNICODE),
                'opinion'  => json_encode( ['ar' => 'عمل مميز جدا ونتمني مزيد من التعاون عمل مميز جدا ونتمني مزيد من التعاون' , 'en' => 'Very special work and we hope for more cooperation Very special work and we hope for more cooperation'], JSON_UNESCAPED_UNICODE),
                'image'    => '1.png',
            ],
            [
                'name'              => json_encode( ['ar' => 'محمد علي' , 'en' => 'mohamed ali' ], JSON_UNESCAPED_UNICODE),
                'job'               => json_encode( ['ar' => 'web designer' , 'en' => 'مصمم ويب' ], JSON_UNESCAPED_UNICODE),
                'opinion'  => json_encode( ['ar' => 'عمل مميز جدا ونتمني مزيد من التعاون عمل مميز جدا ونتمني مزيد من التعاون', 'en' => 'Very special work and we hope for more cooperation Very special work and we hope for more cooperation'], JSON_UNESCAPED_UNICODE),
                'image'    => '2.png',
            ],
        ]);
    }
}
