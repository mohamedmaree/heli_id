<?php

namespace App\Http\Controllers\Site;

use App\Models\IntroSlider;
use App\Models\IntroSocial;
use App\Models\SiteSetting;
use App\Models\IntroHowWork;
use App\Models\IntroService;
use Illuminate\Http\Request;
use App\Models\IntroMessages;
use App\Models\IntroPartener;
use App\Models\IntroFqsCategory;
use App\Models\Team;
use App\Models\portfolioCategory;
use App\Models\Portfolio;

use App\Services\SettingService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\sendMessageRequest;

class IntroController extends Controller
{
    public function index()
    {
        view()->share([
            'services'        => IntroService::get() ,
            'sliders'         => IntroSlider::get() ,
            'teams'           => Team::get() ,
            'parteners'       => IntroPartener::get() ,
            'categoies'        => portfolioCategory::get() ,
            'socials'         => IntroSocial::get() ,
            'settings'        => SettingService::appInformations(SiteSetting::pluck('value', 'key')) ,
        ]);
        return view('intro_site.index');
    }

    
    public function serviceDetails(IntroService $service){
        view()->share([
            'services'        => IntroService::get() ,
            'socials'         => IntroSocial::get() ,
            'settings'        => SettingService::appInformations(SiteSetting::pluck('value', 'key')) ,
        ]);
        return view('intro_site.serviceDetails',get_defined_vars());
    }


    public function portfolioDetails(Portfolio $portfolio){
        view()->share([
            'services'        => IntroService::get() ,
            'socials'         => IntroSocial::get() ,
            'settings'        => SettingService::appInformations(SiteSetting::pluck('value', 'key')) ,
        ]);
        return view('intro_site.portfolioDetails',get_defined_vars());
    }

    public function privacyPolicy(){
        view()->share([
            'socials'         => IntroSocial::get() ,
            'settings'        => SettingService::appInformations(SiteSetting::pluck('value', 'key')) ,
        ]);
        return view('intro_site.privacy');
    }


    public function sendMessage(sendMessageRequest $request)
    {
        IntroMessages::create($request->validated());
        return response()->json(['status' => 'done' , 'message' => __('intro_site.message_sent') ]) ;
    }

    /***************** change lang  *****************/
    public function SetLanguage($lang)
    {
        if ( in_array( $lang, [ 'ar', 'en' ] ) ) {

            if ( session() -> has( 'lang' ) )
                session() -> forget( 'lang' );

            session() -> put( 'lang', $lang );

        } else {
            if ( session() -> has( 'lang' ) )
                session() -> forget( 'lang' );

            session() -> put( 'lang', 'ar' );
        }

//        dd(session( 'lang' ));
        return back();
    }
}
