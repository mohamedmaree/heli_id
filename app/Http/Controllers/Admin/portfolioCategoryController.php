<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\portfoliocategories\Store;
use App\Http\Requests\Admin\portfoliocategories\Update;
use App\Models\portfolioCategory ;
use App\Traits\Report;


class portfolioCategoryController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $portfoliocategories = portfolioCategory::search(request()->searchArray)->paginate(30);
            $html = view('admin.portfoliocategories.table' ,compact('portfoliocategories'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.portfoliocategories.index');
    }

    public function create()
    {
        return view('admin.portfoliocategories.create');
    }


    public function store(Store $request)
    {
        portfolioCategory::create($request->validated());
        Report::addToLog('  اضافه قسم') ;
        return response()->json(['url' => route('admin.portfoliocategories.index')]);
    }
    public function edit($id)
    {
        $portfoliocategory = portfolioCategory::findOrFail($id);
        return view('admin.portfoliocategories.edit' , ['portfoliocategory' => $portfoliocategory]);
    }

    public function update(Update $request, $id)
    {
        $portfoliocategory = portfolioCategory::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل قسم') ;
        return response()->json(['url' => route('admin.portfoliocategories.index')]);
    }

    public function show($id)
    {
        $portfoliocategory = portfolioCategory::findOrFail($id);
        return view('admin.portfoliocategories.show' , ['portfoliocategory' => $portfoliocategory]);
    }
    public function destroy($id)
    {
        $portfoliocategory = portfolioCategory::findOrFail($id)->delete();
        Report::addToLog('  حذف قسم') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (portfolioCategory::whereIntegerInRaw('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من أقسام معرض الأعمال') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
