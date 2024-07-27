<?php
namespace Database\Seeders;

use App\Models\IntroHowWork;
use Illuminate\Database\Seeder;
use DB;
class IntroHowWorkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intro_how_works')->insert([
            [
                'title' => json_encode(['ar' => 'حمل التطبيق' , 'en'  => 'uploade app'], JSON_UNESCAPED_UNICODE) ,
                'image' => '1.png' ,
            ] , [
                'title' => json_encode(['ar' => 'تسجيل مستخدم جديد' , 'en'  => 'Register New User'], JSON_UNESCAPED_UNICODE) ,
                'image' => '2.png' ,
            ] , [
                'title' => json_encode(['ar' => 'أدخل رمز التحقق لتفعيل الحساب' , 'en'  => 'Send Activation Code To activate account'], JSON_UNESCAPED_UNICODE) ,
                'image' => '3.png' , 
            ] , [
                'title' => json_encode(['ar' => 'حدد مكان إقامتك على الخريطة' , 'en'  => 'Locate Your location'], JSON_UNESCAPED_UNICODE) ,
                'image' => '4.png' , 
            ]
        ]);
    }
}
