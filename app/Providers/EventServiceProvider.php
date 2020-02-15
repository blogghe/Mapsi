<?php

namespace App\Providers;

use App\Events\NewProblemHasBeenReportedEvent;
use App\Listeners\MailProblemToReporterListener;
use App\Listeners\MailProblemToUserListener;
use Illuminate\Support\Facades\Event;
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
        NewProblemHasBeenReportedEvent::class=>[
            MailProblemToReporterListener::class,
            MailProblemToUserListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
