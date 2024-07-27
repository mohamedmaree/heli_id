<?php

namespace App\Http\Controllers\Admin;

use App\Models\Intro ;
use App\Traits\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\intros\Store;
use App\Http\Requests\Admin\intros\Update;


class IntroController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $intros = Intro::search(request()->searchArray)->paginate(30);
            $html = view('admin.intros.table' ,compact('intros'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.intros.index');
    }
    
    public function create()
    {
        return view('admin.intros.create');
    }


    public function store(Store $request)
    {
        Intro::create($request->validated() );
        Report::addToLog('  اضافه صفحة تعريفية') ;
        return response()->json(['url' => route('admin.intros.index')]);
    }
    public function edit($id)
    {
        $intro = Intro::findOrFail($id);
        return view('admin.intros.edit' , ['intro' => $intro]);
    }

    public function update(Update $request, $id)
    {
        $intro = Intro::findOrFail($id)->update($request->validated() );
        Report::addToLog('  تعديل صفحة تعريفية') ;
        return response()->json(['url' => route('admin.intros.index')]);
    }

    public function show($id)
    {
        $intro = Intro::findOrFail($id);
        return view('admin.intros.show' , ['intro' => $intro]);
    }

    public function destroy($id)
    {
        $intro = Intro::findOrFail($id)->delete();
        Report::addToLog('  حذف صفحة تعريفية') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Intro::whereIntegerInRaw('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من الصفحات التعريفية') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
