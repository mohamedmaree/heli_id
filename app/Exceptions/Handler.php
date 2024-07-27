<?php

namespace App\Exceptions;

use App\Traits\ResponseTrait;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler {
  use ResponseTrait;

  protected $dontReport = [
    //
  ];

  protected $dontFlash = [
    'password',
    'password_confirmation',
  ];

  public function report(Throwable $exception) {
    parent::report($exception);
  }

  public function render($request, Throwable $exception) {
    if ($request->is('api/*')) {
      if ($exception instanceof ModelNotFoundException) {
        $msg = __('apis.model_not_found');
      }

      if ($exception instanceof NotFoundHttpException) {
        $msg = __('apis.route_not_found');
      }

      if ($exception instanceof AuthenticationException) {
        return $this->unauthenticatedReturn();
      }

      return $this->response('exception', $msg ?? $exception->getMessage(),
        ['line' => $exception->getLine(), 'file' => $exception->getFile()]
      );
    }

    return parent::render($request, $exception);
  }
}
