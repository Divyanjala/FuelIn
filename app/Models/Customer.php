<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    protected $fillable = [
        'first_name','last_name',
        'code','mobile_number','vehical_number','nic',
        'address','vehical_type','chassis_number','fuel_type_id','user_id'
    ];

    public function fuel(){
        return $this->belongsTo(FuelType::class,'fuel_type_id');
    }
}
