<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlayResource;
use App\Models\Season;
use App\Models\Week;
use App\Services\SimulationService;
use Illuminate\Http\Request;

class SimulationController extends Controller
{
    public function simulateSeason(Season $season)
    {
        $weeks = $season->weeks;
        foreach ($weeks as $week) {
            $this->performWeekSimulation($week);
        }

        return response()->success([], 'Season successfully simulated');
    }

    public function simulateWeek(Week $week)
    {
        $plays = $this->performWeekSimulation($week);
        return response()->success(PlayResource::collection($plays), "Week successfully simulated");
    }

    private function performWeekSimulation($week)
    {
        $plays = $week->plays;
        $predictions = $week->season->predictions;

        foreach ($plays as $play) {
            $simulation = new SimulationService($play, $predictions);
            $scores = $simulation->simulate();
            $play->updatePlayedGame($scores[0], $scores[1]);
        }
        return $plays;
    }
}
