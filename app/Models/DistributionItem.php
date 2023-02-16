<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributionItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'distribution_id','qty','amount',
        'fuel_type_id'
    ];
    public function product()
    {
        return $this->belongsTo(FuelType::class, 'fuel_type_id');
    }
}
