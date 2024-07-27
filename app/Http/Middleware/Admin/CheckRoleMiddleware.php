<?php

namespace App\Http\Middleware\Admin;

use App\Models\Permission;
use App\Traits\AdminFirstRouteTrait;
use App\Traits\ResponseTrait;
use Closure;
use Illuminate\Support\Facades\Route;

class CheckRoleMiddleware {
  use ResponseTrait, AdminFirstRouteTrait;

  public function handle($request, Closure $next) {
    $permissions = Permission::where('role_id', auth()->guard('admin')->user()->role_id)
      ->pluck('permission')
      ->toArray();

    if (!in_array(Route::currentRouteName(), $permissions)) {
      $msg = trans('auth.not_authorized');
      if ($request->ajax()) {
        return $this->unauthorizedReturn(['type' => 'notAuth']);
      }

      if (!count($permissions)) {
        session()->invalidate();
        session()->regenerateToken();
        return redirect(route('admin.login'));
      }

      session()->flash('danger', $msg);

      return redirect()->route($this->getAdminFirstRouteName($permissions));
      
    }

    return $next($request);
  }
}
