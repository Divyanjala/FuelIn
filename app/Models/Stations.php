<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stations extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','code','district','des','user_id',
        'address','tele','account_nb','manager_tele'
    ];
}
