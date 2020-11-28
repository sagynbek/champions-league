<?php

namespace App\Listeners\Week;

use App\Events\Season\SeasonCreatedEvent;
use App\Models\Team;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Week;

class CreateWeeksListener
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
        $teamCount = Team::count();
        $totalWeeks = ($teamCount - 1) * 2; // one team plays with all the other teams, at home/opposite

        for ($it = 1; $it <= $totalWeeks; $it++) {
            Week::create([
                'week'  =>  $it,
                'season_id' =>  $event->season->id,
            ]);
        }
    }
}
