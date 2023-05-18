<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DronePlan extends Model
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
}
