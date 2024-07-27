<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\countries\Store;
use App\Http\Requests\Admin\countries\Update;
use App\Models\Country ;
use App\Traits\Report;


class CountryController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $countries = Country::search(request()->searchArray)->latest()->paginate(30);
            $html = view('admin.countries.table' ,compact('countries'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.countries.index');
    }
    
    public function create()
    {
        return view('admin.countries.create');
    }


    public function store(Store $request)
    {
        Country::create($request->validated());
        Report::addToLog('  اضافه بلد') ;
        return response()->json(['url' => route('admin.countries.index')]);
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('admin.countries.edit' , ['country' => $country]);
    }

    public function update(Update $request, $id)
    {
        $country = Country::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل بلد') ;
        return response()->json(['url' => route('admin.countries.index')]);
    }

    public function show($id)
    {
        $country = Country::findOrFail($id);
        return view('admin.countries.show' , ['country' => $country]);
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id)->delete();
        Report::addToLog('  حذف بلد') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Country::whereIntegerInRaw('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من البلاد') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
