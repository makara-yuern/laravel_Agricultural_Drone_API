<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Battery extends Model
{
    use HasFactory;

    protected $fillable = [
        'currentBatteries',
        'capacity',
        'drone_id',
    ];
<<<<<<< HEAD
    
    public static function store($reques, $id = null)
    {
        $battery = $reques->only(['currentBatteries', 'capacity','drone_id']);

        $battery = self::updateOrCreate(['id' => $id], $battery);

        return $battery;
=======
    public function drone(): BelongsTo
    {
        return $this->belongsTo(Drone::class);
>>>>>>> 3e9a8d02b861ccadb07c57547548fe672bb714d4
    }

    
}
