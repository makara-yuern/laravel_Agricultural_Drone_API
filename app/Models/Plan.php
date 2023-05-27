<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'planTypes',
        'location',
        'cropTypes',
        'date',
        'time',
    ];

    public function drones(): BelongsToMany
    {
        return $this->belongsToMany(Drone::class, 'drone_plans');
    }

    public static function store($reques, $id = null)
    {
        $user = $reques->only(['name', 'planTypes', 'location','cropTypes', 'date', 'time']);

        $user = self::updateOrCreate(['id' => $id], $user);

        return $user;
    }

    public function instruction(): HasOne
    {
        return $this->hasOne(Instruction::class);
    }
}