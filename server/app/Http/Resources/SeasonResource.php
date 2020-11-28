<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SeasonResource extends JsonResource
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
            'name'      =>  "Season " . $this->id,
            'weeks'     =>  $this->weeks->count(),
            // 'playedWeeks'     =>  $this->weeks->plays->played()->count(),
            // 'notPlayedWeeks'     =>  $this->weeks->plays->notPlayed()->count(),
        ];
    }
}
