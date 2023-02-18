<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerQuota extends Model
{
    use HasFactory;
    protected $fillable = [
        'qty','use_qty','customer_id'
    ];
}
