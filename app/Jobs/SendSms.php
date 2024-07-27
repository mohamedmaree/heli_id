<?php

namespace App\Jobs;

use App\Models\User;
use App\Libraries\Sms;
use App\Traits\SmsTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels , SmsTrait;

    public $phones , $message;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($phones , $message)
    {
        $this->phones = $phones;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->sendSms($this->phones , $this->message);
    }
}
