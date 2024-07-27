<?php

namespace App\Http\Controllers\Admin;

use App\Traits\Report;
use App\Models\Coupon ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\coupons\Store;
use App\Http\Requests\Admin\coupons\Update;
use App\Http\Requests\Admin\Coupon\renewCouponRequest;


class CouponController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $coupons = Coupon::search(request()->searchArray)->paginate(30);
            $html = view('admin.coupons.table' ,compact('coupons'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.coupons.index');
    }

    public function create()
    {
        return view('admin.coupons.create');
    }


    public function store(Store $request)
    {
        Coupon::create($request->except(['expire_date']) + (['expire_date' => date('Y-m-d H:i:s', strtotime($request->expire_date))]));
        Report::addToLog('  اضافه كوبون خصم') ;
        return response()->json(['url' => route('admin.coupons.index')]);
    }

    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupons.edit' , ['coupon' => $coupon]);
    }

    public function update(Update $request, $id)
    {
        $coupon = Coupon::findOrFail($id)->update($request->except(['expire_date'])  + (['expire_date' => date('Y-m-d H:i:s', strtotime($request->expire_date))]));
        Report::addToLog('  تعديل كوبون خصم') ;
        return response()->json(['url' => route('admin.coupons.index')]);
    }
    public function show($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupons.show' , ['coupon' => $coupon]);
    }
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id)->delete();
        Report::addToLog('  حذف كوبون خصم') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Coupon::whereIntegerInRaw('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من كوبونات الخصم') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }

    public function renew(renewCouponRequest $request)
    {
        $coupon = Coupon::findOrFail($request->id) ;
        if ($request->status == 'closed') {
            $coupon->update(['status' => 'closed']) ; 
            $html = '<span class="btn btn-sm round btn-outline-success open-coupon" data-toggle="modal" id="div_'.$coupon->id.'" data-target="#notify" data-id="'.$coupon->id.'"> 
                        '.__('admin.reactivation_Coupon').'  <i class="feather icon-rotate-cw"></i>
                    </span>'
                    ;
        }else{
            $coupon->update($request->except(['expire_date'])  + ([ 'expire_date' => date('Y-m-d H:i:s', strtotime($request->expire_date))]));
            $html = '<span class="btn btn-sm round btn-outline-danger change-coupon-status" data-status="closed" data-id="'.$coupon->id.'"> 
                        '.__('admin.Stop_Coupon').'  <i class="feather icon-slash"></i>
                    </span>';
        } 
        
        return response()->json(['message' => __('admin.update_coupon_status_successfully') , 'html' => $html , 'id' => $request->id]) ; 
    }
}
