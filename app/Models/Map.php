<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Map extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'dateTime',
        'area',
        'images',
        'drone_id',
    ];

    public static function store($reques, $id = null)
    {
        $map = $reques->only(['type', 'dateTime','area','images', 'drone_id']);

        $map = self::updateOrCreate(['id' => $id], $map);

        return $map;
    }

    public function drone():BelongsTo
    {
        return $this->belongsTo(Drone::class);
    }
}
