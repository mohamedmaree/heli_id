<?php

namespace App\Http\Controllers\Admin;

use Image ;
use App\Traits\Report;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Services\SettingService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cache;
use App\Models\Country ;

class SettingController extends Controller
{
    public function index(){
        $data = Cache::rememberForever('settings', function () {
            return SettingService::appInformations(SiteSetting::pluck('value', 'key'));
        });
        $countries = Country::orderBy('id','ASC')->get();
        return view('admin.settings.index',compact('data','countries'));
    }


    public function update(Request $request){
        Cache::forget('settings');
        foreach ( $request->all() as $key => $val ){
            if (in_array($key , ['logo' , 'fav_icon' , 'default_user' , 'intro_loader' , 'intro_logo'  ,'about_image_2' , 'about_image_1' , 'login_background','profile_cover'])) {
                if($val->getClientOriginalExtension() == 'svg'){
                    if($key == 'default_user'){
                        $thumbsPath    = 'images/users/';
                        $name     = time() . rand(1000000, 9999999) . '.' . $val->getClientOriginalExtension();
                        SiteSetting::where( 'key', $key ) -> update( [ 'value' => $name ] );
                    }else if ($key == 'no_data') {
                        $thumbsPath    = 'images/';
                        $name = 'no_data.png';
                    }else{
                        $name          = time() . rand(1000000, 9999999) . '.' . $val->getClientOriginalExtension();
                        $thumbsPath    = 'images/settings/';
                        SiteSetting::where( 'key', $key ) -> update( [ 'value' => $name ] );
                    }
                    $val->storeAs($thumbsPath , $name);
                }else{
                    $img           = Image::make($val);
                    if($key == 'default_user'){
                        $thumbsPath    = 'storage/images/users/';
                        $name     = time() . rand(1000000, 9999999) . '.' . $val->getClientOriginalExtension();
                        SiteSetting::where( 'key', $key ) -> update( [ 'value' => $name ] );
                    }else if ($key == 'no_data') {
                        $thumbsPath    = 'storage/images/';
                        $name = 'no_data.png';
                    }else{
                        $name          = time() . rand(1000000, 9999999) . '.' . $val->getClientOriginalExtension();
                        $thumbsPath    = 'storage/images/settings/';
                        SiteSetting::where( 'key', $key ) -> update( [ 'value' => $name ] );
                    }
                    $img->save($thumbsPath.$name);
                }

                if($val->getClientOriginalExtension() == 'svg'){
                    $val->storeAs($thumbsPath , $name);
                }else{
                    $img           = Image::make($val);
                    $img->save($thumbsPath.$name);
                }

            }else{
                // if($val){
                    SiteSetting::where( 'key', $key ) -> update( [ 'value' => $val ] );
            }
        }
        if ($request->is_production) {
            SiteSetting::where( 'key', 'is_production' ) -> update( [ 'value' => 1 ] );
        }else{
            SiteSetting::where( 'key', 'is_production' ) -> update( [ 'value' => 0 ] );
        }

        Cache::rememberForever('settings', function () {
            return SettingService::appInformations(SiteSetting::pluck('value', 'key'));
        });
            
        Report::addToLog('تعديل الاعدادت') ;
        return back()->with('success','تم الحفظ');
    }


    public function messageAll(Request $request,$type){

        $this->userRepo->messageAll($request->all(),$type);
        return back()->with('success','تم الارسال');
    }

    public function messageOne(Request $request,$type){

        $this->userRepo->messageOne($request->all(),$type);
        return back()->with('success','تم الارسال');
    }

    public function sendEmail(Request $request){

        $this->settingRepo->sendEmail($request->all());
        return back()->with('success','تم الارسال');
    }
}
