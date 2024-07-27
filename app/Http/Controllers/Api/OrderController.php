<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use App\Notifications\OrderNotification;
use App\Models\Order;


class OrderController extends Controller
{
    use ResponseTrait;
// notification example

    public function finishOrder(Request $request)
    {
        $order = Order::findorfail($request['order_id']);
        //TODO: finish order setting..

        $order->user->notify(new OrderNotification($order, $order->user));

        return $this->response('success', __('apis.closeOrder'));
    }

}
