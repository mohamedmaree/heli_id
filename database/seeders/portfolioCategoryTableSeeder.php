<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class portfolioCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('portfolio_categories')->insert([
            [
                'name'              => json_encode( ['ar' => 'تطبيقات' , 'en' => 'App' ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'name'              => json_encode( ['ar' => 'تصميمات' , 'en' => 'Designs' ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'name'              => json_encode( ['ar' => 'ويب' , 'en' => 'Web' ], JSON_UNESCAPED_UNICODE),
            ],
        ]);
    }
}
