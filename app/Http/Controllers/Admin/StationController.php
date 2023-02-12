<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use domain\Facades\SettingFacade;
use domain\Facades\StationFacade;
use Illuminate\Http\Request;

class StationController extends Controller
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'address' => ['required', 'string', 'max:255'],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        StationFacade::stationStore($request->all());
        return redirect()->route('admin.station')->with('alert-success', 'Fuel Station Added Successfully');
    }
}
