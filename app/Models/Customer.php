<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];



    protected $fillable = [
        'full_name', 'code','mobile_number','vehical_number','nic',
        'address','vehical_type','chassis_number','fuel_type_id','user_id','type_id'
    ];

    public function fuel(){
        return $this->belongsTo(FuelType::class,'fuel_type_id');
    }

    public function quota(){
        return $this->hasOne(CustomerQuota::class,'customer_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
