<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\sms\Store;
use App\Models\SMS ;
use App\Traits\Report;


class SMSController extends Controller
{
    public function index()
    {
        $smss = SMS::latest()->get();
        return view('admin.sms.index', compact('smss'));
    }

    public function change(Request $request)
    {
        $sms = SMS::findOrFail($request->id) ;
        $disableAll = SMS::get()->each->update(['active' => 0]);
        if ($disableAll) 
            $sms->update(['active' => 1]);

        return response()->json();
    }

    public function update(Store $request, $id)
    {
        $sms = SMS::findOrFail($id)->update($request->validated());
        Report::addToLog('تعديل باقة رسائل') ;
        return response()->json();
    }
}
