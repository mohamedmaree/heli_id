<?php
namespace Database\Seeders;

use App\Models\IntroSlider;
use Illuminate\Database\Seeder;
use DB;

class IntroSliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intro_sliders')->insert([
            [
                'image'       => '1.jpg' ,
                'title'       => json_encode(['ar' => 'عنوان البانر الاول', 'en' => 'First banner title ' ], JSON_UNESCAPED_UNICODE) ,
                'description' => json_encode(['ar' => ' وصف البانر الاول' , 'en' => 'first banner description' ], JSON_UNESCAPED_UNICODE) ,
            ] ,[
                'image'       => '2.jpg' ,
                'title'       => json_encode(['ar' => 'عنوان البانر الثاني', 'en' => 'secound banner title ' ], JSON_UNESCAPED_UNICODE) ,
                'description' => json_encode(['ar' => ' وصف البانر الثاني' , 'en' => 'secound banner description' ], JSON_UNESCAPED_UNICODE) ,
            ],[
                'image'       => '3.jpg' ,
                'title'       => json_encode(['ar' => 'عنوان البانر الثالث', 'en' => 'third banner title ' ], JSON_UNESCAPED_UNICODE) ,
                'description' => json_encode(['ar' => ' وصف البانر الثالث' , 'en' => 'third banner description' ], JSON_UNESCAPED_UNICODE ),
            ]
        ]);
       
    }
}
