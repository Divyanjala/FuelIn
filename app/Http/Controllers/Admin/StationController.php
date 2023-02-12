<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


class StationController extends ParentController
{
    public function index()
    {
       return view('pages.admin.station.index');
    }
}
