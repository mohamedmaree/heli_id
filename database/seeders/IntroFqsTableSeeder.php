<?php
namespace Database\Seeders;

use App\Models\IntroFqs;
use Illuminate\Database\Seeder;
use DB;

class IntroFqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intro_fqs')->insert([
            [
                'title'                     => json_encode(['ar' => 'السؤال الاول القسم الاول'  , 'en' => 'first question first category'], JSON_UNESCAPED_UNICODE) ,
                'description'               => json_encode(['ar' => 'الاجابة الاولي القسم الاول'  , 'en' => 'first answer first category'], JSON_UNESCAPED_UNICODE) ,
                'intro_fqs_category_id'     => 1 ,
            ] , [
                'title'                     => json_encode(['ar' => 'السؤال الثانيه القسم الثاني'  , 'en' => 'secound question secound category'], JSON_UNESCAPED_UNICODE) ,
                'description'               => json_encode(['ar' => 'الاجابة الثانية القسم الثاني'  , 'en' => 'secound answer secound category'], JSON_UNESCAPED_UNICODE) ,
                'intro_fqs_category_id'     => 2 ,
            ] , [
                'title'                     => json_encode(['ar' => 'السؤال الثالث القسم الثالث'  , 'en' => 'third question third category'], JSON_UNESCAPED_UNICODE) ,
                'description'               => json_encode(['ar' => 'الاجابة الثالثة القسم الثالث'  , 'en' => 'third answer third category'], JSON_UNESCAPED_UNICODE) ,
                'intro_fqs_category_id'     => 3 ,
            ] , [
                'title'                     => json_encode(['ar' => 'السؤال الرابع القسم الرابع'  , 'en' => 'fourth question fourth category'], JSON_UNESCAPED_UNICODE) ,
                'description'               => json_encode(['ar' => 'الاجابة الرابعه القسم الرابع'  , 'en' => 'fourth answer fourth category'], JSON_UNESCAPED_UNICODE) ,
                'intro_fqs_category_id'     => 4 ,
            ]
        ]);
        
    }
}
