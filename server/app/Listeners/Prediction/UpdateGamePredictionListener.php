<?php

namespace App\Listeners\Prediction;

use App\Events\Play\PlayUpdatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateGamePredictionListener
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
     * @param  PlayUpdatedEvent  $event
     * @return void
     */
    public function handle(PlayUpdatedEvent $event)
    {
        $predictions = $event->play->week->season->predictions;
        $play = $event->play;

        foreach ($predictions as $prediction) {
            if ($play->containsTeamId($prediction->team_id)) {
                $prediction->updatePrediction($play);
            }
        }
    }
}
