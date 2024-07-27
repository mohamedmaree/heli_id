<?php
namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use DB;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $remote = isset($_SERVER["REMOTE_ADDR"]) ?? false;
        $url = 'database/seeders/json/cities.json' ;
        
        $citiesJson =  json_decode(file_get_contents($url,true));

        $cities = array_map(function ($city) {
            return [
                'name'          =>  json_encode(['ar' => $city->name_ar , 'en' => $city->name_en ] , JSON_UNESCAPED_UNICODE),
                'country_id'    =>  $city->country_id,
                'region_id'     =>  $city->region_id,
                'created_at'    => \Carbon\Carbon::now()->subMonth(rand(0,8)),
            ];
        }, $citiesJson );
        
        DB::table('cities')->insert($cities) ;

    }
}
