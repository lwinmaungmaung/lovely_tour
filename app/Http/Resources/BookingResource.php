<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'adult' => $this->adult,
            'child' => $this->child,
            'special_instructions' => $this->special_instructions,
        ];
    }
}
