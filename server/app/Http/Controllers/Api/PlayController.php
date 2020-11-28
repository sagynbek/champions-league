<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlayResource;
use App\Models\Week;
use Illuminate\Http\Request;

class PlayController extends Controller
{
    public function index(Week $week)
    {
        return PlayResource::collection($week->plays);
    }

    public function update(Request $request, $id)
    {
        // TODO: complete
    }
}
