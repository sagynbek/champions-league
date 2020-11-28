<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WeeklyStandingResource extends JsonResource
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
            'id'        =>  $this->id,
            'team'      =>  new TeamResource($this->team),
            // 'position'  =>  $this->position,
            'points'    =>  $this->points,
            'plays'     =>  $this->plays,
            'wins'      =>  $this->wins,
            'draws'     =>  $this->draws,
            'loses'     =>  $this->loses,
            'goals_for' =>  $this->goals_for,
            'goals_against' =>  $this->goals_against,
            'goals_dif' =>  $this->goals_dif,
        ];
    }
}
