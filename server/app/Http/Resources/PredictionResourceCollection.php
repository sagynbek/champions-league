<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PredictionResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->processStrength();

        return [
            'data'  =>  PredictionResource::collection($this->collection),
        ];
    }

    private function processStrength()
    {
        $total = $this->getTotalStrength();
        foreach ($this->collection as $prediction) {
            $prediction->strength = round($prediction->computed_strength * 100 / $total);
        }
    }

    private function getTotalStrength()
    {
        $total = 0;
        foreach ($this->collection as $prediction) {
            $total += $prediction->computed_strength;
        }
        return $total;
    }
}
