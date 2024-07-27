<?php

namespace App\Http\Controllers\Admin;

use App\Models\LogActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $reports = LogActivity::search(request()->searchArray)->paginate(30);
            $html = view('admin.reports.table' ,compact('reports'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.reports.index');
    }
  
     public function show($id)
     {
         $report = LogActivity::findOrFail($id);
         return view('admin.reports.show', compact('report'));
     }

    public function destroy($id)
    {
        $admin = LogActivity::findOrFail($id)->delete(); 
        return response()->json(['id' =>$id]);
    }


    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (LogActivity::whereIntegerInRaw('id' , $ids)->get()->each->delete()) {
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
