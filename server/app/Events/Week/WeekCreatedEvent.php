<?php

namespace App\Events\Week;

use App\Models\Week;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WeekCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $week;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Week $week)
    {
        $this->week = $week;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
