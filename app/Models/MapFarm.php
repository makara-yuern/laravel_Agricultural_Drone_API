<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapFarm extends Model
{
    use HasFactory;

    protected $fillable = [
        'map_id',
        'dron_id',
    ];
}