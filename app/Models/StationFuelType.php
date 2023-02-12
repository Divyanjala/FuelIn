<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StationFuelType extends Model
{
    use HasFactory;
    protected $fillable = [
        'station_id','fuel_type_id',
    ];
}
