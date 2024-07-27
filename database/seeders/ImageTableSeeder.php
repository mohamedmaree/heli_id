<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'name'          =>  json_encode(['ar' => 1 , 'en' => 1 ] , JSON_UNESCAPED_UNICODE),
                'image'          => '1.png' ,
            ] , [
                'name'          =>  json_encode(['ar' => 2 , 'en' => 2 ] , JSON_UNESCAPED_UNICODE),
                'image'          => '2.png' , 
            ],[
                'name'          =>  json_encode(['ar' => 3 , 'en' => 3 ] , JSON_UNESCAPED_UNICODE),
                'image'          => '3.png' , 
            ],[
                'name'          =>  json_encode(['ar' => 4 , 'en' => 4 ] , JSON_UNESCAPED_UNICODE),
                'image'          => '4.png' , 
            ]
        ]);
    }
}
