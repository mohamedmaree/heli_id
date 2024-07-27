<?php

namespace App\Traits;


trait GeneralTrait {

    public function isCodeCorrect($user = null, $code): bool {
        if (!$user
          || $code != $user->code
          //|| $user->code_expire->isPast()
          //|| env('RESET_CODE') != $code
        ) {
          return false;
        }
        return true;
    }
}
