<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use domain\Facades\DistributionFacade;
use domain\Facades\SettingFacade;
use domain\Facades\StationFacade;
use Illuminate\Http\Request;

class DistributionController extends ParentController
{
    public function index()
    {

       $response['orders']=DistributionFacade::all();
       return view('pages.admin.distribution.index')->with($response);
    }

    public function newDistribution()
    {
        $response['types']=SettingFacade::allTypes();
        $response['stations']=StationFacade::allStations();
       return view('pages.admin.distribution.new')->with($response);
    }
    public function storeDistribution(Request $request)
    {
        DistributionFacade::make($request->all());
        return redirect()->route('admin.distribution')->with('alert-success', 'Order Added Successfully');
    }

    public function viewDistribution($id)
    {
       $response['order']=DistributionFacade::get($id);
       return view('pages.admin.distribution.view')->with($response);
    }

    public function approveDistribution($id)
    {
        DistributionFacade::approve($id);
         return redirect()->route('admin.distribution')->with('alert-success', 'Order Approved Successfully');;
    }

    public function completeOrder($id)
    {
        DistributionFacade::update($id,3);
         return redirect()->route('admin.order')->with('alert-success', 'Order Completed Successfully');;
    }
}
