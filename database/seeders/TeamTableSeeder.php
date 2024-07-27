<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;


class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teams')->insert([
            [
                'name'              => json_encode( ['ar' => 'محمد علي' , 'en' => 'mohamed ali' ], JSON_UNESCAPED_UNICODE),
                'job'               => json_encode( ['ar' => 'web designer' , 'en' => 'مصمم ويب' ], JSON_UNESCAPED_UNICODE),
                'image'             => 'user1.png',
            ],
            [
                'name'              => json_encode( ['ar' => 'احمد حسن' , 'en' => 'ahmed hassan' ], JSON_UNESCAPED_UNICODE),
                'job'               => json_encode( ['ar' => 'web developer' , 'en' => 'مطور ويب' ], JSON_UNESCAPED_UNICODE),
                'image'             => 'user2.png',
            ],
            [
                'name'              => json_encode( ['ar' => 'احمد حسن' , 'en' => 'ahmed hassan' ], JSON_UNESCAPED_UNICODE),
                'job'               => json_encode( ['ar' => 'web developer' , 'en' => 'مطور ويب' ], JSON_UNESCAPED_UNICODE),
                'image'             => 'user3.png',
            ],
            [
                'name'              => json_encode( ['ar' => 'احمد حسن' , 'en' => 'ahmed hassan' ], JSON_UNESCAPED_UNICODE),
                'job'               => json_encode( ['ar' => 'web developer' , 'en' => 'مطور ويب' ], JSON_UNESCAPED_UNICODE),
                'image'             => 'user4.png',
            ],
        ]);
    }
}
