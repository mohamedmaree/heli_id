<?php

namespace App\Http\Middleware;

use App\Traits\AdminFirstRouteTrait;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RedirectIfAuthenticated {
  use AdminFirstRouteTrait;
  public function handle($request, Closure $next, $guard = null) {
    if (Auth::guard($guard)->check()) {

      if ('admin' == $guard) {
        return redirect()->route($this->getAdminFirstRouteName());
      } else {
        return redirect()->route('intro');
      }

    }

    return $next($request);
  }
}
