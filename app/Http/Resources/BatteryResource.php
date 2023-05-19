<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BatteryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
<<<<<<< HEAD
            'id' => $this->id,
            'currentBatteries' => $this->currentBatteries,
            'capacity' => $this->capacity,
            'drone_id' => $this->drone,
=======
            'id' => $this-> id,
            'currentBatteries' => $this -> currentBatteries,
            'capacity' => $this -> capacity,
            'dron_id' => $this -> dron_id
>>>>>>> 3e9a8d02b861ccadb07c57547548fe672bb714d4
        ];
    }
}
