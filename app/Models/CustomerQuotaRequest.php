<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerQuotaRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'qty','date','customer_id',
        'station_id','quota_index'
    ];

    public function station()
    {
        return $this->belongsTo(Stations::class, 'station_id');
    }
}
