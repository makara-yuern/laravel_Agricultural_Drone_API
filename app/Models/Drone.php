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
        'id',
        'droneTypes',
        'modelNumber',
        'manufacturer',
        'size',
        'time',
        'purpose',
        'intructions',
        'farmer_id',
        'location_id',
        'user_id',
    ];

    public static function store($reques, $id = null)
    {
        $drone = $reques->only(['droneTypes', 'modelNumber','manufacturer', 'size','time', 'purpose', 'farmer_id', 'user_id', 'location_id',]);

        $drone = self::updateOrCreate(['id' => $id], $drone);

        $drone = request('plans');
        $drone->plans()->sync($drone);

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

    public function images():HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function battery():HasOne
    {
        return $this->hasOne(Battery::class);
    }

    public function map():HasOne
    {
        return $this->hasOne(Map::class);
    }

    public function plans(): BelongsToMany
    {
        return $this->belongsToMany(Plan::class, 'drone_plans');
    }
}
