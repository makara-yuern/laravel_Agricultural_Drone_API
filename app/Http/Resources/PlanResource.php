<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
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
            'name' => $this->name,
            'planTypes' => $this->planTypes,
            'location' => $this->location,
            'cropTypes' => $this->cropTypes,
            'date' => $this->date,
            'time' => $this->time,
            'drones' => $this->drones,
            'instructions' => $this->instruction
        ];
    }
}