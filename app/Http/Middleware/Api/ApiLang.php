<?php

namespace App\Http\Middleware\Api;

use App;
use App\Models\User;
use Carbon\Carbon;
use Closure;

class ApiLang {

  public function handle($request, Closure $next) {
    $lang = defaultLang();
    if ($request->header('Lang') != null && in_array($request->header('Lang'), languages())) {
      $lang = $request->header('Lang');
    } elseif (auth()->check()) {
      $lang = auth()->user()->lang;
    }

    App::setLocale($lang);
    Carbon::setLocale($lang);
    return $next($request);
  }
}
