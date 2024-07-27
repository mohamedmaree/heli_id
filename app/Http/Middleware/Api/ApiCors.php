<?php

namespace App\Http\Middleware\Api;

use Closure;

class ApiCors {
  public function handle($request, Closure $next) {
    $headers = [
      "Access-Control-Allow-Origin"  => "*",
      "Access-Control-Allow-Headers" => "X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method",
      "Access-Control-Allow-Methods" => "POST, GET, OPTIONS, PUT, DELETE",

      "Content-Type"                 => "application/json,form-data,charset=UTF-8", // use this with android and ios
      // "Content-Type"              => "application/json", // use this with flutter

      "Access-Control-Max-Age"       => "1000",
    ];

    $response = $next($request);

    foreach ($headers as $key => $value) {
      $response->header($key, $value);
    }

    return $response;
  }
}
