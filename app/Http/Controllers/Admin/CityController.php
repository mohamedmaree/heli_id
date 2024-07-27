<?php

namespace App\Http\Controllers\Admin;

use App\Models\City ;
use App\Traits\Report;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\cities\Store;
use App\Models\Region;

class CityController extends Controller
{

        /************ AJAX ****************/
        public function getCountryRegions(Request $request){
            $models   = Region::where(['country_id'=>$request->country_id])->orderBy('name','ASC')->get();
            return response()->json($models);
        }

        /************ AJAX ****************/

        
    public function index($id = null)
    {
        if (request()->ajax()) {
            $cities = City::with('region')->search(request()->searchArray)->paginate(30);
            $html = view('admin.cities.table' ,compact('cities'))->render() ;
            return response()->json(['html' => $html]);
        }
        $regions = Region::get() ; 
        $countries = Country::get();
        return view('admin.cities.index' , get_defined_vars());
    }

    public function create()
    {
        $regions = Region::get() ; 
        $countries = Country::get();
        return view('admin.cities.create' , get_defined_vars());
    }

    public function store(Store $request)
    {
        City::create($request->validated());
        Report::addToLog('اضافه مدينة') ;
        return response()->json(['url' => route('admin.cities.index')]);
    }

    public function edit($id)
    {
        $regions = Region::get() ; 
        $city = City::findOrFail($id);
        $countries = Country::get();
        return view('admin.cities.edit' ,get_defined_vars());
    }

    public function update(Store $request, $id)
    {
        $city = City::findOrFail($id)->update($request->validated() );
        Report::addToLog('  تعديل مدينة') ;
        return response()->json(['url' => route('admin.cities.index')]);
    }

    
     public function show($id)
     {
         $city = City::findOrFail($id);
         $regions = Region::get() ; 
         $countries = Country::get();
        return view('admin.cities.show', get_defined_vars());
     }
 
    public function destroy($id)
    {
        $city = City::findOrFail($id)->delete();
        Report::addToLog('  حذف مدينة') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (City::whereIntegerInRaw('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من المدن') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
