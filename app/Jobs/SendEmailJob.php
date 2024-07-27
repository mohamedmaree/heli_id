<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $emails , $data; 
    public function __construct($emails , $request)
    {
        $this->data = [
            'sender'        => auth('admin')->id()??'',
            'sender_name'   => auth('admin')->user()->name??'',
            'sender_avatar' => auth('admin')->user()->avatar??'',
            'title_ar'      => $request['title'] ,
            'title_en'      => $request['title'] ,
            'title'         => $request['title'] ,
            'message_ar'    => $request['message'],
            'message_en'    => $request['message'],
            'message'       => $request['message'],
            'type'          => 'admin_notify' ,
        ];
        $this->emails = $emails;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Mail::to($this->emails)->send(new \App\Mail\SendMail($this->data));
    }
}
