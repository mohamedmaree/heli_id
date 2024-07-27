<?php

namespace App\Http\Controllers\Admin;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Services\SettingService;
use App\Http\Controllers\Controller;

class IntroSetting extends Controller
{
    public function index()
    {
        $data =  SettingService::appInformations(SiteSetting::pluck('value', 'key'));
        return view('admin.intro_setting.index' , compact('data'));
    }
}
