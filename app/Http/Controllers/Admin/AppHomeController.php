<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\apphomes\Store;
use App\Http\Requests\Admin\apphomes\Update;
use App\Models\AppHome ;
use App\Traits\Report;
use App\Models\Category ;
use App\Models\Image ;


class AppHomeController extends Controller
{

    //****************** Ajax ******************/
    public function getRecordsByType(Request $request){
        if($request->type == 'categories'){
            $models  = Category::where('parent_id',null)->orderBy('name','ASC')->get();
        }elseif($request->type == 'ads'){
            $models  = Image::orderBy('name','ASC')->get();
        }
        return response()->json($models);
    }
    //****************** Ajax ******************/
    public function index($id = null)
    {
        if (request()->ajax()) {
            $apphomes = AppHome::search(request()->searchArray)->paginate(30);
            $html = view('admin.apphomes.table' ,compact('apphomes'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.apphomes.index');
    }

    public function create()
    {
        return view('admin.apphomes.create');
    }


    public function store(Store $request)
    {
        $add_dates = ($request->add_dates)? 1:0;
        AppHome::create($request->validated()+(['add_dates' => $add_dates]));
        Report::addToLog('  اضافه عناصر الصفحة الرئيسية') ;
        return response()->json(['url' => route('admin.apphomes.index')]);
    }
    public function edit($id)
    {
        $apphome = AppHome::findOrFail($id);
        if($apphome->type == 'categories'){
            $records  = Category::where('parent_id',null)->orderBy('name','ASC')->get();
        }elseif($apphome->type == 'ads'){
            $records  = Image::orderBy('name','ASC')->get();
        }
        return view('admin.apphomes.edit' , get_defined_vars());
    }

    public function update(Update $request, $id)
    {
        $add_dates = ($request->add_dates)? 1:0;
        $apphome = AppHome::findOrFail($id)->update($request->validated()+(['add_dates' => $add_dates]));
        Report::addToLog('  تعديل عناصر الصفحة الرئيسية') ;
        return response()->json(['url' => route('admin.apphomes.index')]);
    }

    public function show($id)
    {
        $apphome = AppHome::findOrFail($id);
        if($apphome->type == 'categories'){
            $records  = Category::where('parent_id',null)->orderBy('name','ASC')->get();
        }elseif($apphome->type == 'ads'){
            $records  = Image::orderBy('name','ASC')->get();
        }
        return view('admin.apphomes.show' , get_defined_vars());
    }
    public function destroy($id)
    {
        $apphome = AppHome::findOrFail($id)->delete();
        Report::addToLog('  حذف عناصر الصفحة الرئيسية') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (AppHome::whereIntegerInRaw('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من عناصر الصفحة الرئيسية') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
