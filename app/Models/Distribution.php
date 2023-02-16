<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    use HasFactory;
    const STATUS = ['PENDING' => 0,  'APPROVED' => 1];
    protected $fillable = [
        'des','status','station_id','amount','paid_amount',
        'issue_date','created_by','approved_by','amount'
    ];

    public function approve()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }


    public function station()
    {
        return $this->belongsTo(Stations::class, 'station_id');
    }

    public function distributionItems(){
        return $this->hasMany(DistributionItem::class,'distribution_id');
    }

}
