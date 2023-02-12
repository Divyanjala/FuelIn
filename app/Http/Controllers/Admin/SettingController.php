<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function fuelType()
    {
       return view('pages.admin.fuel_type.index');
    }
}
