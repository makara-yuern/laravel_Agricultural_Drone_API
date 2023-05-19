<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Farmer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'email',
        'password',
    ];
    public function drone(): HasMany
    {
        return $this->hasMany(Drone::class);
    }
}
