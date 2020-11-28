<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PredictionResource;
use App\Models\Season;
use Illuminate\Http\Request;

class PredictionController extends Controller
{

    public function index(Season $season)
    {
        return PredictionResource::collection($season->predictions);
    }
}
