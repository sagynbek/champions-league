<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlayResource extends JsonResource
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
            'team1'         =>  $this->team1,
            'team2'         =>  $this->team2,
            'team1_score'   =>  $this->team1_score,
            'team2_score'   =>  $this->team2_score,
        ];
    }
}
