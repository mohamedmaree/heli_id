<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware {
  public function handle($request, Closure $next) {
    if (!Auth::guard('admin')->check()
      || !Auth::guard('admin')->user()->role_id > 0 || Auth::guard('admin')->user()->is_blocked == 1 ) {
        auth('admin')->logout();

        if(session()->has('beforeLoginUrl')){
          session()->remove('beforeLoginUrl');
        }
        session()->put('beforeLoginUrl' ,url()->current());

      return redirect()->route('admin.login');
    }

    if(session()->has('beforeLoginUrl')){
      $currentUrl = session()->get('beforeLoginUrl');
      session()->remove('beforeLoginUrl');
      return redirect()->to($currentUrl);
    }

    return $next($request);
  }
}
