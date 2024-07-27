<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IntroFqsCategory;
use DB;

class IntroFqsCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intro_fqs_categories')->insert([
            [
                'title'  => json_encode( ['ar' => 'عامة', 'en' => 'public'], JSON_UNESCAPED_UNICODE) ,
            ] , [
                'title'  => json_encode( ['ar' => 'التسجيل في التطبيق', 'en' => 'Register in the app'], JSON_UNESCAPED_UNICODE) ,
            ] , [
                'title'  => json_encode( ['ar' => 'خدمات التطبيق', 'en' => 'app services'], JSON_UNESCAPED_UNICODE) ,
            ] , [
                'title'  => json_encode( ['ar' => 'تعديل البيانات', 'en' => 'edit informations'], JSON_UNESCAPED_UNICODE) ,
            ]
        ]);
    }
}
