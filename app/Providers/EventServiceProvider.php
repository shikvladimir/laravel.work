<?php

namespace App\Providers;

use App\Events\EmailToAdmin;
use App\Events\EmailToUser;
use App\Listeners\EmailToAdminNotification;
use App\Listeners\EmailToUserNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        EmailToAdmin::class => [
            EmailToAdminNotification::class,
        ],
        EmailToUser::class => [
            EmailToUserNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
