<?php

namespace App\Http\Controllers\Admin;

use App\Traits\Report;
use App\Models\IntroSocial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\IntroSocials\Store;

class IntroSocialController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $socials = IntroSocial::search(request()->searchArray)->paginate(30);
            $html = view('admin.introsocials.table' ,compact('socials'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.introsocials.index');
    }
  

    public function create()
    {
        return view('admin.introsocials.create');
    }

    public function store(Store $request)
    {
        IntroSocial::create($request->validated());
        Report::addToLog('  اضافه وسيلة تواصل لقسم وسائل التواصل الخاصة بالموقع التعريفي') ;
        return response()->json(['url' => route('admin.introsocials.index')]);
    }

    public function edit($id)
    {
        $social = IntroSocial::findOrFail($id);
        return view('admin.introsocials.edit' , ['social' => $social]);
    }

    public function update(Store $request, $id)
    {
        IntroSocial::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل وسيلة تواصل  في قسم وسائل التواصل الخاصة بالموقع التعريفي') ;
        return response()->json(['url' => route('admin.introsocials.index')]);
    }

    public function show($id)
    {
        $social = IntroSocial::findOrFail($id);
        return view('admin.introsocials.show' , ['social' => $social]);
    }
    public function destroy($id)
    {
        IntroSocial::findOrFail($id)->delete();
        Report::addToLog('  حذف وسيلة تواصل  من قسم وسائل التواصل الخاصة بالموقع التعريفي') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (IntroSocial::whereIntegerInRaw('id' , $ids)->get()->each->delete()) {
            Report::addToLog('  حذف محموعه من وسائل التواصل  من قسم وسائل التواصل الخاصة بالموقع التعريفي') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
