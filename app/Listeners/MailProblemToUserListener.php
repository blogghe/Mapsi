<?php

namespace App\Listeners;

use App\Mail\NewProblemReportedMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class MailProblemToUserListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //sleep(10);
        dd($event);
        dump('sendmail to user after creation problem'  );
        ///Mail::to('logghebarteld@gmail.com')->send(new NewProblemReportedMail());


    }
}
