<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'latitude',
        'longitude',
        'altitude',
    ];

    public static function store($reques, $id = null)
    {
        $location = $reques->only(['latitude', 'longitude','altitude']);

        $location = self::updateOrCreate(['id' => $id], $location);

        return $location;
    }

    public function drones():HasMany
    {
        return $this->hasMany(Drone::class);
    }
}
