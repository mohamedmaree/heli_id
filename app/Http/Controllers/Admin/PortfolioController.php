<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\portfolios\Store;
use App\Http\Requests\Admin\portfolios\Update;
use App\Models\Portfolio ;
use App\Traits\Report;
use App\Models\portfolioCategory ;
use App\Models\portfolioImages ;


class PortfolioController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $portfolios = Portfolio::search(request()->searchArray)->paginate(30);
            $html = view('admin.portfolios.table' ,compact('portfolios'))->render() ;
            return response()->json(['html' => $html]);
        }
        $categories = portfolioCategory::latest()->get();
        return view('admin.portfolios.index',get_defined_vars());
    }

    public function create()
    {
        $categories = portfolioCategory::latest()->get();
        return view('admin.portfolios.create',get_defined_vars());
    }

    public function store(Store $request)
    {
        $portfolio = Portfolio::create($request->validated());
        if ($request->hasFile('images')) {
            $this->storeFiles($portfolio, $request->file('images'));
        }
        Report::addToLog('  اضافه معرض أعمال') ;
        return response()->json(['url' => route('admin.portfolios.index')]);
    }

    private function storeFiles($portfolio, $files)
    {    
        foreach ($files as $file) {
            $portfolio->images()->create(['image' => $file]);
        }
    }


    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $categories = portfolioCategory::latest()->get();
        return view('admin.portfolios.edit' ,get_defined_vars());
    }

    public function update(Update $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->update($request->validated());
        if ($request->hasFile('images')) {
            $this->storeFiles($portfolio, $request->file('images'));
        }
        Report::addToLog('  تعديل معرض أعمال') ;
        return response()->json(['url' => route('admin.portfolios.index')]);
    }

    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $categories = portfolioCategory::latest()->get();
        return view('admin.portfolios.show' ,get_defined_vars());
    }
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id)->delete();
        Report::addToLog('  حذف معرض أعمال') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Portfolio::whereIntegerInRaw('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من معرض الأعمال') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }

    public function deleteImage(Request $request)
    {
        $image = portfolioImages::find($request->image_id);
        $image->delete();
        return response()->json(['msg' => 'success']);
    }
}
