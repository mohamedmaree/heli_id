<?php

namespace App\Http\Controllers\Admin;

use App\Traits\Report;
use App\Models\IntroHowWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\IntroHowWorks\Store;
use App\Http\Requests\Admin\IntroHowWorks\Update;

class IntroHowWorkController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $howWorks = IntroHowWork::search(request()->searchArray)->paginate(30);
            $html = view('admin.introhowworks.table' ,compact('howWorks'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.introhowworks.index');
    }

    public function create()
    {
        return view('admin.introhowworks.create');
    }
    public function store(Store $request)
    {
        IntroHowWork::create($request->validated() ) ;
        Report::addToLog('  اضافه طريقة عمل لقسم كيفيه عمل الموقع التعريفي') ;
        return response()->json(['url' => route('admin.introhowworks.index')]);
    }
    public function edit($id)
    {
        $howWork = IntroHowWork::findOrFail($id);
        return view('admin.introhowworks.edit' , ['howWork' => $howWork]);
    }

    public function update(Update $request, $id)
    {
        IntroHowWork::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل طريقة عمل لقسم كيفيه عمل الموقع التعريفي') ;
        return response()->json(['url' => route('admin.introhowworks.index')]);
    }
    public function show($id)
    {
        $howWork = IntroHowWork::findOrFail($id);
        return view('admin.introhowworks.show' , ['howWork' => $howWork]);
    }

    public function destroy($id)
    {
        IntroHowWork::findOrFail($id)->delete();
        Report::addToLog('  حذف طريقة عمل لقسم كيفيه عمل الموقع التعريفي') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (IntroHowWork::whereIntegerInRaw('id' , $ids)->get()->each->delete($ids)) {
            Report::addToLog('  حذف العديد من طرق العمل لقسم كيفيه عمل الموقع التعريفي') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
