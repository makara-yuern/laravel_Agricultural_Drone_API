<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'planTypes',
        'location',
        'cropTypes',
        'date',
        'time',
    ];

    public static function store($reques, $id = null)
    {
        $user = $reques->only(['planTypes', 'location','cropTypes', 'date', 'time']);

        $user = self::updateOrCreate(['id' => $id], $user);

        return $user;
    }

    public function drones(): BelongsToMany
    {
        return $this->belongsToMany(Drone::class, 'drone_plans');
    }
}
