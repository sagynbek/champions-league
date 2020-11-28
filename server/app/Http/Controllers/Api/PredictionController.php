<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PredictionResourceCollection;
use App\Models\Season;
use Illuminate\Http\Request;

class PredictionController extends Controller
{

    public function index(Season $season)
    {
        return new PredictionResourceCollection($season->predictions);
    }
}
