<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Week;
use Illuminate\Http\Request;

class SimulationController extends Controller
{
    public function PlayAllGamesOfWeek(Week $week)
    {
        $plays = $week->plays;
    }
}
