<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    protected $fillable = [
        'place',
        'drone_id',
    ];

    public static function store($reques, $id = null)
    {
        $map = $reques->only(['place', 'drone_id']);

        $map = self::updateOrCreate(['id' => $id], $map);

        return $map;
    }
}
