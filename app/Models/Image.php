<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
