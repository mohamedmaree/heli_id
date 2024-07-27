<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\Notify;
use App\Models\User;
use App\Jobs\SendSms;
use App\Models\Admin;
use App\Jobs\AdminNotify;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function index($var = null)
    {
       return view('admin.notifications.index');
    }


    public function sendNotifications(Request $request)
    {
        if ($request->user_type == 'all_users' ) {
            $rows = User::get() ; 
        }else if($request->user_type == 'active_users'){
            $rows = User::where('active' , true)->get() ; 
        }else if($request->user_type == 'not_active_users'){
            $rows = User::where('active' , false)->get() ; 
        }else if($request->user_type == 'blocked_users'){
            $rows = User::where('is_blocked' , true)->get() ; 
        }else if($request->user_type == 'not_blocked_users'){
            $rows = User::where('is_blocked' , false)->get() ; 
        }else if($request->user_type == 'admins'){
            $rows = Admin::get() ; 
        }
        if ($request->type == 'notify') {
            if ($request->user_type == 'admins') {
                dispatch(new AdminNotify($rows, $request));
            }else{
                dispatch(new Notify($rows, $request));
            }
        }else if ($request->type == 'email') {
            dispatch(new SendEmailJob($rows->pluck('email'), $request));
        }else{
            dispatch(new SendSms($rows->pluck('phone')->toArray() , $request->message));
        }

        return response()->json() ; 
    }
}
