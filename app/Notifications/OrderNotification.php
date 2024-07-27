<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Traits\Firebase;

class OrderNotification extends Notification
{
    use Queueable , Firebase;
    protected $receiver, $data;

    public function __construct($order, $reciever)
    {
        $this->receiver = $reciever;
        
        $this->data     = [
            'order_id'    => $order->id,
            'order_num'   => $order->order_num,
            'type'        => 'finish_order' ,
        ];
    }
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray()
    {
        $tokens = [];
        $types  = [];
        foreach ($notifiable->devices as $device) {
            $tokens[] = $device->device_id ; 
            $types[]  = $device->device_type ; 
        }
        $this->sendFcmNotification($tokens  ,$types, $this->data , $notifiable->lang  ) ;
        return $this->data;
    }
}
