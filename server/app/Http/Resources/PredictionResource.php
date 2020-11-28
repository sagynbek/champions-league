<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PredictionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'team'      =>  new TeamResource($this->team),
            'percent'   =>  $this->strength,
        ];
    }
}
