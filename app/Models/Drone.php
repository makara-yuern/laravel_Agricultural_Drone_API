<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drone extends Model
{
    use HasFactory;

    protected $fillable = [
        'droneTypes',
        'modelNumber',
        'manufacturer',
        'size',
        'time',
        'purpose',
        'farmer_id',
        'user_id',
    ];

    public static function store($reques, $id = null)
    {
        $drone = $reques->only(['droneTypes', 'modelNumber','manufacturer', 'size','time', 'purpose', 'farmer_id', 'user_id']);

        $drone = self::updateOrCreate(['id' => $id], $drone);

        return $drone;
    }
}
