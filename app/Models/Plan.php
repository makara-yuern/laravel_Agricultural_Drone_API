<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'planTypes',
        'location',
        'cropTypes',
        'date',
        'time',
    ];

    public static function store($reques, $id = null)
    {
        $user = $reques->only(['planTypes', 'location','cropTypes', 'date', 'time']);

        $user = self::updateOrCreate(['id' => $id], $user);

        return $user;
    }
}
