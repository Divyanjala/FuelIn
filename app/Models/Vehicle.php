<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function vehicleType(): BelongsTo
    {
        return $this->belongsTo(VehicleType::class,'type_id');
    }

    public function fuelType(): BelongsTo
    {
        return $this->belongsTo(FuelType::class,'fuel_type_id');
    }
}
