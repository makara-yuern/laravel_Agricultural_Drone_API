<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Map extends Model
{
    use HasFactory;

    protected $fillable = [
        'area',
        'images',
        'drone_id',
        'farm_id',
    ];

    public static function store($reques, $id = null)
    {
        $map = $reques->only(['area','images', 'drone_id', 'farm_id',]);

        $map = self::updateOrCreate(['id' => $id], $map);

        return $map;
    }

    public function drone():BelongsTo
    {
        return $this->belongsTo(Drone::class);
    } 

    public function farm(): BelongsTo
    {
        return $this->belongsTo(Farm::class);
    }
}
