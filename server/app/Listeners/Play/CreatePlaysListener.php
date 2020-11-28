<?php

namespace App\Listeners\Play;

use App\Events\Week\WeekCreatedEvent;
use App\Models\Play;
use App\Models\Team;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreatePlaysListener
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
        $weekDay = $event->week->week;
        $plays = $this->getPlaysForWeekDay($teams, $weekDay);

        foreach ($plays as $it => $play) {
            $team1Id = $play[0];
            $team2Id = $play[1];

            Play::create([
                'week_id'   =>  $event->week->id,
                'team1_id'  =>  $team1Id,
                'team2_id'  =>  $team2Id,
            ]);
        }
    }

    private function getPlaysForWeekDay($teams, $weekDay)
    {
        /** 
         * $teamIdList Stored as following:
         * [
         *  '1' =>  [1st team]->id,
         *  '2' =>  [2nd team]->id,
         *  ..... 
         *  'n' =>  [nth team]->id
         * ]
         */
        $teamIdList = [];
        foreach ($teams as $it => $team) {
            $teamIdList[$it] = $team->id;
        }

        $permutation = $this->allPermutationsOfTeams($teamIdList);
        return $permutation[$weekDay - 1]; // -1, because weekDay starts from 1
    }

    private function allPermutationsOfTeams($teamIdList)
    {
        // NOTE: if team count grows, replace response with real permutation
        return [
            [
                [$teamIdList[0], $teamIdList[1]],
                [$teamIdList[2], $teamIdList[3]]
            ],
            [
                [$teamIdList[1], $teamIdList[0]],
                [$teamIdList[3], $teamIdList[2]]
            ],
            [
                [$teamIdList[0], $teamIdList[2]],
                [$teamIdList[1], $teamIdList[3]],
            ],
            [
                [$teamIdList[2], $teamIdList[0]],
                [$teamIdList[3], $teamIdList[1]],
            ],
            [
                [$teamIdList[0], $teamIdList[3]],
                [$teamIdList[1], $teamIdList[2]],
            ],
            [
                [$teamIdList[3], $teamIdList[0]],
                [$teamIdList[2], $teamIdList[1]],
            ]
        ];
    }
}
