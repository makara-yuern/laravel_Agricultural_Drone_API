<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Map extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'date',
        'area',
        'image',
        'drone_id',
    ];

    public static function store($reques, $id = null)
    {
        $map = $reques->only(['type', 'date','area','image', 'drone_id']);

        $map = self::updateOrCreate(['id' => $id], $map);

        return $map;
    }

    public function drone():HasOne
    {
        return $this->hasOne(Drone::class);
    }
}
