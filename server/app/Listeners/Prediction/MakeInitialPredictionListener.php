<?php

namespace App\Listeners\Prediction;

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
        $teamsStrength = [];
        $total = 0;

        // Generate teams' initial powers
        foreach ($teams as $team) {
            $initStrength = $this->getInitialStrength($team);

            $total += $initStrength;
            $teamsStrength[$team->id] = $initStrength;
        }

        // Generate teams' initial powers
        foreach ($teamsStrength as $teamId => $strength) {
            Prediction::create([
                'season_id'         =>  $event->season->id,
                'team_id'           =>  $teamId,
                'initial_strength'  =>  $strength,
                'computed_strength'  =>  round($strength * 100 / $total),
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
