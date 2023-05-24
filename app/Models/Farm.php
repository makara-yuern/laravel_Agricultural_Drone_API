<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Farm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'farmer_id',
    ];

    public static function store($reques, $id = null)
    {
        $farm = $reques->only(['name', 'address','farmer_id']);

        $farm = self::updateOrCreate(['id' => $id], $farm);

        return $farm;
    }

    public function farmer():BelongsTo
    {
        return $this->belongsTo(Farmer::class);
    }
}
