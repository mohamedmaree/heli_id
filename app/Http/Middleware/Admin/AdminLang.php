<?php

namespace App\Http\Middleware\Admin;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class AdminLang
{
    public function handle($request, Closure $next)
    {

        $lang = defaultLang();
        if (Session::has('lang') && in_array(Session::get('lang'), languages())) {
            $lang = Session::get('lang');
        }

        App::setLocale($lang);
        Carbon::setLocale($lang);

        return $next($request);
    }
}
