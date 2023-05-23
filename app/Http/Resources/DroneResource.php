<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DroneResource extends JsonResource
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
            'droneTypes' => $this->droneTypes,
            'modelNumber' => $this->modelNumber,
            'manufacturer' => $this->manufacturer,
            'size' => $this->size,
            'time' => $this->time,
            'purpose' => $this->purpose,
            'intructions' => $this->intructions,
            'farmer' => $this->farmer,
            'user' => $this->user,
            'location' => $this->location,
        ];
    }
}
