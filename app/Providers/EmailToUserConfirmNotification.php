<?php

namespace App\Providers;

use App\Providers\EmailToUserConfirm;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailToUserConfirmNotification
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
     * @param  EmailToUserConfirm  $event
     * @return void
     */
    public function handle(EmailToUserConfirm $event)
    {
        //
    }
}
