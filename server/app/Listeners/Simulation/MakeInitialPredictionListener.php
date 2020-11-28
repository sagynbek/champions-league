<?php

namespace App\Listeners\Simulation;

use App\Events\Season\SeasonCreatedEvent;
use App\Models\Prediction;
use App\Models\Team;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MakeInitialPredictionListener
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
     * @param  SeasonCreatedEvent  $event
     * @return void
     */
    public function handle(SeasonCreatedEvent $event)
    {
        /** 
         * It only makes initial prediciton when season is created,
         * Furthermore predictions are updated according to plays
         */

        $teams = Team::all();
        foreach ($teams as $team) {
            $initStrength = $this->getInitialStrength($team);
            Prediction::create([
                'season_id'         =>  $event->season->id,
                'team_id'           =>  $team->id,
                'initial_strength'  =>  $initStrength,
                'computed_strength'  =>  $initStrength,
            ]);
        }
    }

    private function getInitialStrength($team)
    {
        $min = max(0, $team->max_strength - 20);
        $max = $team->max_strength;

        return random_int($min, $max);
    }
}
