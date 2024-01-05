<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TourItineraryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tour_id' => $this->tour_id,
            'day_id' => $this->day_id,
            'begin' => $this->begin,
            'end' => $this->end,
            'name' => $this->name,
            'description' => $this->description,
            'type' => $this->type,
        ];
    }
}
