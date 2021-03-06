<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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

        \App\Events\SeasonCreated::class => [
            \App\Listeners\SetupSeason::class,
        ],

        \App\Events\OrderPaid::class => [
            \App\Listeners\MailOrderPaidConfirmation::class,
        ],
    ];
}
