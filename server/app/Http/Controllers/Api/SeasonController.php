<?php

namespace App\Http\Controllers\Api;

use App\Events\Season\SeasonCreatedEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\SeasonResource;
use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index()
    {
        return SeasonResource::collection(Season::paginate());
    }

    public function store()
    {
        $season = Season::create([]);
        event(new SeasonCreatedEvent($season));

        return response()->success(
            new SeasonResource($season),
            'New season created successfully',
            201
        );
    }
}
