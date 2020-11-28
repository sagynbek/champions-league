<?php

namespace App\Listeners\WeeklyStanding;

use App\Events\Play\PlayUpdatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class UpdateWeeklyStandingListener
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
        $weeklyStandingTeam1 = $event->play->getWeeklyStandingTeam1();
        $weeklyStandingTeam2 = $event->play->getWeeklyStandingTeam2();

        $weeklyStandingTeam1->updateWeeklyStanding($event->play);
        $weeklyStandingTeam2->updateWeeklyStanding($event->play);
    }
}
