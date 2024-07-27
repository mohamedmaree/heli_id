<?php

namespace App\Http\Controllers\Admin;

use App\Traits\Report;
use Illuminate\Http\Request;
use App\Models\IntroPartener;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\IntroParteners\Store;
use App\Http\Requests\Admin\IntroParteners\Update;

class IntroPartenerController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $partensers = IntroPartener::search(request()->searchArray)->paginate(30);
            $html = view('admin.introparteners.table' ,compact('partensers'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.introparteners.index');
    }

    public function create()
    {
        return view('admin.introparteners.create');
    }


    public function store(Store $request)
    {
        IntroPartener::create($request->validated());
        Report::addToLog('  اضافه شريك لقسم شركائنا في العمل') ;
        return response()->json(['url' => route('admin.introparteners.index')]);
    }
    public function edit($id)
    {
        $partenser = IntroPartener::findOrFail($id);
        return view('admin.introparteners.edit' , ['partenser' => $partenser]);
    }

    public function update(Update $request, $id)
    {
        IntroPartener::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل شريك  في قسم شركائنا في العمل') ;
        return response()->json(['url' => route('admin.introparteners.index')]);
    }
    public function show($id)
    {
        $partenser = IntroPartener::findOrFail($id);
        return view('admin.introparteners.show' , ['partenser' => $partenser]);
    }
    
    public function destroy($id)
    {
        IntroPartener::findOrFail($id)->delete();
        Report::addToLog('  حذف شريك  من قسم شركائنا في العمل') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (IntroPartener::whereIntegerInRaw('id' , $ids)->get()->each->delete()) {
            Report::addToLog('  حذف مجموعه من الشركاء  من قسم شركائنا في العمل') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
