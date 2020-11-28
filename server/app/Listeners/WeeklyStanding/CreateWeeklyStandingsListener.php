<?php

namespace App\Listeners\WeeklyStanding;

use App\Events\Week\WeekCreatedEvent;
use App\Models\Team;
use App\Models\WeeklyStanding;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateWeeklyStandingsListener
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
     * @param  WeekCreatedEvent  $event
     * @return void
     */
    public function handle(WeekCreatedEvent $event)
    {
        $teams = Team::all();
        foreach ($teams as $team) {
            WeeklyStanding::create([
                'week_id'   =>  $event->week->id,
                'team_id'   =>  $team->id,
            ]);
        }
    }
}
