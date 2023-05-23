<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Drone extends Model
{
    use HasFactory;

    protected $fillable = [
        'drones_id',
        'droneTypes',
        'modelNumber',
        'manufacturer',
        'size',
        'time',
        'purpose',
        'instructions',
        'farmer_id',
        'location_id',
        'user_id',
    ];

    public function plan(): BelongsToMany
    {
        return $this->belongsToMany(Plan::class, 'drone_plans');
    }

    public static function store($reques, $id = null)
    {
        $drone = $reques->only(['drones_id', 'droneTypes', 'modelNumber','manufacturer', 'size','time', 'purpose', 'farmer_id', 'user_id', 'location_id', 'instructions']);

        $drone = self::updateOrCreate(['id' => $id], $drone);

        $drones = request('plans');
        $drone->plan()->sync($drones);

        return $drone;
    }

    
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function location():BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function farmer():BelongsTo
    {
        return $this->belongsTo(Farmer::class);
    }

    public function maps():HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function battery():HasMany
    {
        return $this->hasMany(Battery::class);
    }
}
