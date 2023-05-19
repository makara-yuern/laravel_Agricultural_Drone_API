<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
<<<<<<< HEAD

    public static function store($reques, $id = null)
    {
        $drone = $reques->only(['droneTypes', 'modelNumber','manufacturer', 'size','time', 'purpose', 'farmer_id', 'user_id']);

        $drone = self::updateOrCreate(['id' => $id], $drone);

        return $drone;
=======
    public function battery(): HasOne
    {
        return $this->hasOne(Battery::class);
>>>>>>> 3e9a8d02b861ccadb07c57547548fe672bb714d4
    }
}
