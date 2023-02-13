<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name','last_name',
        'code','mobile_number','vehical_number','nic',
        'address','vehical_type','chassis_number','fuel_type_id','user_id'
    ];
}
