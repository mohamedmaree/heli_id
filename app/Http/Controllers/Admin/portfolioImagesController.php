<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\portfolioimages\Store;
use App\Http\Requests\Admin\portfolioimages\Update;
use App\Models\portfolioImages ;
use App\Traits\Report;


class portfolioImagesController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $portfolioimages = portfolioImages::search(request()->searchArray)->paginate(30);
            $html = view('admin.portfolioimages.table' ,compact('portfolioimages'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.portfolioimages.index');
    }

    public function create()
    {
        return view('admin.portfolioimages.create');
    }


    public function store(Store $request)
    {
        portfolioImages::create($request->validated());
        Report::addToLog('  اضافه صور معرض الأعمال') ;
        return response()->json(['url' => route('admin.portfolioimages.index')]);
    }
    public function edit($id)
    {
        $portfolioimages = portfolioImages::findOrFail($id);
        return view('admin.portfolioimages.edit' , ['portfolioimages' => $portfolioimages]);
    }

    public function update(Update $request, $id)
    {
        $portfolioimages = portfolioImages::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل صور معرض الأعمال') ;
        return response()->json(['url' => route('admin.portfolioimages.index')]);
    }

    public function show($id)
    {
        $portfolioimages = portfolioImages::findOrFail($id);
        return view('admin.portfolioimages.show' , ['portfolioimages' => $portfolioimages]);
    }
    public function destroy($id)
    {
        $portfolioimages = portfolioImages::findOrFail($id)->delete();
        Report::addToLog('  حذف صور معرض الأعمال') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (portfolioImages::whereIntegerInRaw('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من صور معرض الأعمال') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
