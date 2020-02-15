<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewProblemHasBeenReportedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $problem;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( $problem )
    {
        $this->problem = $problem;
    }
}
