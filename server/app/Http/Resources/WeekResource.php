<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WeekResource extends JsonResource
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
            'week'      =>  $this->week,
            'plays'     =>  PlayResource::collection($this->plays),
            // 'standings' =>  $this->standings,
        ];
    }
}
