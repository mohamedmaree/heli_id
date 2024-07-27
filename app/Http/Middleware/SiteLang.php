<?php

namespace App\Http\Middleware;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\App;

class SiteLang {
  public function handle($request, Closure $next) {

    $lang = 'ar';

    if (app('lang') && in_array(app('lang'), languages())) {
      $lang = app('lang');
    }

    App::setLocale($lang);
    Carbon::setLocale($lang);

    return $next($request);
  }
}
