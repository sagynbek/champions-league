<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WeeklyStandingResource;
use App\Models\Week;
use Illuminate\Http\Request;

class WeeklyStandingController extends Controller
{
    public function index(Week $week)
    {
        return WeeklyStandingResource::collection($week->weeklyStandings);
    }
}
