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
        if ($this->is_played) {
            return [
                'team1'         =>  new TeamResource($this->team1),
                'team2'         =>  new TeamResource($this->team2),
                'team1_score'   =>  $this->team1_score,
                'team2_score'   =>  $this->team2_score,
                'status'        =>  'Played',
            ];
        }
        return [
            'team1'         =>  new TeamResource($this->team1),
            'team2'         =>  new TeamResource($this->team2),
            'status'        =>  'NotPlayed',
        ];
    }
}
