<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'date',
        'area',
        'drone_id',
    ];

    public static function store($reques, $id = null)
    {
        $image = $reques->only(['type', 'date','area', 'drone_id']);

        $image = self::updateOrCreate(['id' => $id], $image);

        return $image;
    }

    public function drone():BelongsTo
    {
        return $this->belongsTo(Drone::class);
    }
}
