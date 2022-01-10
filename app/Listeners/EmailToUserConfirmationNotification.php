<?php

namespace App\Listeners;

use App\Events\EmailToUserConfirmation;
use App\Mail\SendEmailUserConfirmation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailToUserConfirmationNotification
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
    public function handle(EmailToUserConfirmation $event)
    {
        Mail::to($event->data->email)->send(new SendEmailUserConfirmation($event->data));
    }
}
