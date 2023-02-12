<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use domain\Facades\SettingFacade;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function fuelType()
    {
       $response['types']=SettingFacade::allTypes();
       return view('pages.admin.fuel_type.index')->with($response);;
    }

    public function fuelTypeNew()
    {
       return view('pages.admin.fuel_type.new');
    }


    /**
     * Store a newly created fuel-type in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fuelTypeStore(Request $request)
    {
        SettingFacade::fuelTypestore($request->all());
        return redirect()->route('admin.fuel-type')->with('alert-success', 'Fuel Type Added Successfully');
    }
}
