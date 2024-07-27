<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Settlement\SendRequest;
use App\Models\Settlement;
use App\Models\User;
use App\Traits\ResponseTrait;


class SettlementController extends Controller
{
    use ResponseTrait;

    public function settlementRequest(SendRequest $request)
    {
        $data = $request->validated();

        $user = auth()->user();


        if ($data['amount'] > $user->wallet_balance){
            $msg =  trans('site.large_amount_settlement');
            return $this->failMsg($msg);
        }

        if ($user->wallet_balance == 0){
            $msg =  trans('site.empty_settlement');
            return $this->failMsg($msg);
        }


        if (Settlement::where(['transactionable_id' => $user->id , 'transactionable_type' => get_class($user)])->where('status','pending')->exists()){
            $msg =  trans('site.exist_settlement');
            return $this->failMsg($msg);
        }

//        $data['user_id'] = $user->id;

        if (!$data['amount']){
            $data['amount'] = $user->wallet_balance;
        }

        $settlement = $user->settlements()->create($data);

        /*  Add Your Notification here  */

        return $this->response('success', __('site.request_successfully'));
    }
}
