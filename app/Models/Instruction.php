<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Instruction extends Model
{
    use HasFactory;
    protected $fillable = [
        'instructions',
        'drone_id',
    ];

    public static function store($reques, $id = null)
    {
        $location = $reques->only(['instructions','drone_id',]);

        $location = self::updateOrCreate(['id' => $id], $location);

        return $location;
    }

    public function drone():BelongsTo
    {
        return $this->belongsTo(Drone::class);
    }
}
