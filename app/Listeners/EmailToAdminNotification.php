<?php

namespace App\Listeners;

use App\Events\EmailToAdmin;
use App\Mail\SendEmailAdmin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailToAdminNotification
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
    public function handle(EmailToAdmin $event)
    {
        Mail::to('vnstore2018@gmail.com')->send(new SendEmailAdmin($event->data));
    }
}
