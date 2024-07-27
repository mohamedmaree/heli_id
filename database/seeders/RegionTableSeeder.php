<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\Region;


class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $remote = isset($_SERVER["REMOTE_ADDR"]) ?? false;
        $url = 'database/seeders/json/regions.json' ;
        
        $regionsJson =  json_decode(file_get_contents($url,true));

        $regions = array_map(function ($region) {
            return [
                'name'          =>  json_encode(['ar' => $region->name_ar , 'en' => $region->name_en ] , JSON_UNESCAPED_UNICODE),
                'country_id'    =>  $region->country_id,
                'created_at'    => \Carbon\Carbon::now()->subMonth(rand(0,8)),
            ];
        }, $regionsJson );
        
        DB::table('regions')->insert($regions) ;
    }
}
