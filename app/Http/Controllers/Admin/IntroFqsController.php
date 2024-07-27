<?php

namespace App\Http\Controllers\Admin;

use App\Traits\Report;
use App\Models\IntroFqs;
use Illuminate\Http\Request;
use App\Models\IntroFqsCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\IntroFqs\Store;

class IntroFqsController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $fqss = IntroFqs::search(request()->searchArray)->paginate(30);
            $html = view('admin.introfqs.table' ,compact('fqss'))->render() ;
            return response()->json(['html' => $html]);
        }
        $categories = IntroFqsCategory::get() ;
        return view('admin.introfqs.index' , compact('categories'));
    }
    public function create()
    {
        $categories = IntroFqsCategory::get() ;
        return view('admin.introfqs.create', compact('categories'));
    }

    public function store(Store $request)
    {
        IntroFqs::create($request->validated() ) ;
        Report::addToLog('  اضافه سؤال شائع الخاص بالموقع التعريفي') ;
        return response()->json(['url' => route('admin.introfqs.index')]);
    }

    public function edit($id)
    {
        $fqs = IntroFqs::findOrFail($id);
        $categories = IntroFqsCategory::get() ;

        return view('admin.introfqs.edit' , ['fqs' => $fqs , 'categories' => $categories]);
    }
    public function update(Store $request, $id)
    {
        IntroFqs::findOrFail($id)->update($request->validated() ) ;
        Report::addToLog('  تعديل سؤال شائع الخاص بالموقع التعريفي') ;
        return response()->json(['url' => route('admin.introfqs.index')]);
    }

    public function show($id)
    {
        $fqs = IntroFqs::findOrFail($id);
        $categories = IntroFqsCategory::get() ;
        return view('admin.introfqs.show' , ['fqs' => $fqs , 'categories' => $categories]);
    }

    public function destroy($id)
    {
        IntroFqs::findOrFail($id)->delete();
        Report::addToLog('  حذف سؤال شائع الخاص بالموقع التعريفي') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (IntroFqs::whereIntegerInRaw('id' , $ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من الاسئلة الشائعة الخاصة بالموقع التعريفي') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
