<?php

namespace App\Http\Controllers\Admin;

use DB ;
use Carbon\Carbon;
use App\Models\City;
use App\Models\User;
use App\Traits\Menu;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    use Menu;
    public function index(){
        $countryArray   = $this->chartData(new Country);
        $cityArray      = $this->chartData(new City);
        $activeUsers    = User::where(['active' => true])->count() ; 
        $notActiveUsers = User::where(['active' => false])->count() ; 
        $menus          = $this->home() ;
        $introSiteCards = $this->introSiteCards() ;
        $colores        = ['info' , 'danger' , 'warning' , 'success' , 'primary'];
        
        return view('admin.statistics.index' , compact('menus' ,'colores' , 'activeUsers' , 'notActiveUsers'  ,'countryArray' , 'cityArray' , 'introSiteCards' ));
    }

    

    public function chartData($model)
    {
        $users = $model::select('id', 'created_at')
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('m'); 
        });

        $usermcount = [];
        $userArr = [];

        foreach ($users as $key => $value) {
            $usermcount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($usermcount[$i])){
                $userArr[] = $usermcount[$i];
            }else{
                $userArr[] = 0;
            }
        }

        return $userArr ; 

    }
}
