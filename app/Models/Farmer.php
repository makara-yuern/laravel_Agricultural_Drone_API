<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Farmer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'email',
        'password',
    ];

    public static function store($reques, $id = null)
    {
        $farmer = $reques->only(['name', 'age','email','password']);

        $farmer = self::updateOrCreate(['id' => $id], $farmer);

        return $farmer;
    }

    public function drones():HasMany
    {
        return $this->hasMany(Drone::class);
    }

    public function farms():HasMany
    {
        return $this->hasMany(Farm::class);
    }
}