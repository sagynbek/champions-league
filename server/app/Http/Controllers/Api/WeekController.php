<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WeekResource;
use App\Models\Season;

class WeekController extends Controller
{
    public function index(Season $season)
    {
        return WeekResource::collection($season->weeks);
    }
}
