<?php

namespace App\Listeners;

use App\Mail\NewProblemReportedMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class MailProblemToReporterListener
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        dd($event);
        //dump('sendmail to '. $event->problem->service->email . ' after creation problem');
        //Mail::to($event->problem->service->email)->send(new NewProblemReportedMail());
    }
}
