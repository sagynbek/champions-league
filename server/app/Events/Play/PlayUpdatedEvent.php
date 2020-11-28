<?php

namespace App\Events\Play;

use App\Models\Play;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PlayUpdatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $play;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Play $play)
    {
        $this->play = $play;
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
