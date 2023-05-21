<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function farmer(): BelongsTo
    {
        return $this->belongsTo(Farmer::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
