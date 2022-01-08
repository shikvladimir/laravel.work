<?php

namespace App\Listeners;

use App\Events\EmailToUser;
use App\Mail\SendEmailUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailToUserNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(EmailToUser $event)
    {
        Mail::to($event->data->email)->send(new SendEmailUser($event->data));
    }
}
