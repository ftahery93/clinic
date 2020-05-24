<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class EmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $data, $path;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $path)
    {
        $this->data = $data;
        $this->path = $path;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $this->sendmail($this->path, $this->data);
    }

    public function sendmail($template, $data)
    {

        Mail::send($template,  $data, function ($message) use ($data) {
            $message->to($data['email'], $data['fullname'])->subject($data['subject']);
            $message->from($data['MAIL_FROM_ADDRESS'], $data['APP_NAME']);
        });

        if (Mail::failures()) {
            return false;
        } else {
            return true;
        }
    }
}
