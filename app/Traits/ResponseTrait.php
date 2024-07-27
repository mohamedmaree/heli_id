<?php

namespace App\Traits;

trait ResponseTrait {

  /**
   * keys : success, fail, needActive, waitingApprove, unauthenticated, blocked, exception
   */
  //todo: user builder design pattern
  public function response($key, $msg, $data = [], $anotherKey = [], $page = false) {

    $allResponse['key'] = (string) $key;
    $allResponse['msg'] = (string) $msg;

    # unread notifications count if request ask
    if ('success' == $key && request()->has('count_notifications')) {
      $count = 0;
      if (auth()->check()) {
        $count = auth()->user()->notifications()->unread()->count();
      }

      $allResponse['count_notifications'] = $count;
    }

    # additional data
    if (!empty($anotherKey)) {
      foreach ($anotherKey as $otherkey => $value) {
        $allResponse[$otherkey] = $value;
      }
    }

    # res data
    if ([] != $data && (in_array($key, ['success', 'needActive', 'exception']))) {
      $allResponse['data'] = $data;
    }    

    return response()->json($allResponse,$this->getCode($key));
  }

  public function unauthenticatedReturn() {
    return $this->response('unauthenticated', trans('auth.unauthenticated'));
  }

  public function unauthorizedReturn($otherData) {
    return $this->response('unauthorized', trans('auth.not_authorized'), [], $otherData);
  }

  public function blockedReturn($user) {
    $user->logout();
    return $this->response('blocked', __('auth.blocked'));
  }

  public function phoneActivationReturn($user) {
    $data = $user->sendVerificationCode();
    return $this->response('needActive', __('auth.not_active'),$data);
  }

  public function failMsg($msg) {
    return $this->response('fail', $msg);
  }

  public function successMsg($msg = 'done') {
    return $this->response('success', $msg);
  }

  public function successData($data) {
    return $this->response('success', trans('apis.success'), $data);
  }

  public function successOtherData(array $dataArr) {
    return $this->response('success', trans('apis.success'), [], $dataArr);
  }

  public function getCodeMatch($key) {

    // $code = match($key) {
    //   'success' => 200,
    //   'fail' => 400,
    //   'unauthorized' => 400,
    //   'needActive' => 203,
    //   'unauthenticated' => 401,
    //   'blocked' => 423,
    //   'exception' => 500,
    //   default => '200',
    // };

    // return $code;
  }

  public function getCode($key) {
    switch ($key) {
    case 'success':
      $code = 200;
      break;
    case 'fail':
      $code = 400;
      break;
    case 'needActive':
      $code = 203;
      break;
    case 'unauthorized':
      $code = 400;
      break;
    case 'unauthenticated':
      $code = 401;
      break;
    case 'blocked':
      $code = 423;
      break;
    case 'exception':
      $code = 500;
      break;

    default:
      $code = 200;
      break;

    }

    return $code;
  }

}