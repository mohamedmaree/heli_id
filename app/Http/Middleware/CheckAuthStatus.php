<?php

namespace App\Http\Middleware;

use App\Traits\ResponseTrait;
use Closure;
use Illuminate\Http\Request;

class CheckAuthStatus {
  use ResponseTrait;

  public function handle(Request $request, Closure $next) {
    if (!auth()->check()) {
      return $this->unauthenticatedReturn();
    }

    $user = auth()->user();

    if ($user->is_blocked) {
      return $this->blockedReturn($user);
    }

    if (!$user->active) {
      return $this->phoneActivationReturn($user);
    }

    return $next($request);
  }
}
