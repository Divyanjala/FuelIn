<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use domain\Facades\SettingFacade;
use domain\Facades\stationFacade;
use GuzzleHttp\Psr7\Request;

class StationController extends ParentController
{
    public function index()
    {
       return view('pages.admin.station.index');
    }

    public function stationNew()
    {
        $response['types']=SettingFacade::allTypes();
       return view('pages.admin.station.new')->with($response);
    }


    /**
     * Store a newly created fuel-type in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function stationStore(Request $request)
    {
        stationFacade::stationstore($request->all());
        return redirect()->route('admin.station')->with('alert-success', 'Fuel Station Added Successfully');
    }
}
