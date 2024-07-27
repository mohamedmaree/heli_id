<?php

namespace App\Http\Middleware;

use App\Traits\ResponseTrait;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware {
  use ResponseTrait;

  protected function redirectTo($request) {
    if (!$request->is('api/*')) {
      return route('login');
    }
  }
}
