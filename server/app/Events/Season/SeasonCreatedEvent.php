<?php

namespace App\Events\Season;

use App\Models\Season;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SeasonCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $season;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Season $season)
    {
        $this->season = $season;
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
