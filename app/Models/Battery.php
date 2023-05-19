<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Battery extends Model
{
    use HasFactory;

    protected $fillable = [
        'currentBatteries',
        'capacity',
        'drone_id',
    ];
    public function drone(): BelongsTo
    {
        return $this->belongsTo(Drone::class);
    }

    
}
