<?php

namespace App\Http\Controllers\Station;

use App\Http\Controllers\Controller;
use domain\Facades\DistributionFacade;
use domain\Facades\SettingFacade;
use domain\Facades\StationFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DistributionController extends Controller
{
    public function index()
    {
       
       $response['orders']=DistributionFacade::getByStation(Auth::user()->station->id);
       return view('pages.station.distribution.index')->with($response);
    }

    public function newDistribution()
    {
        $response['types']=SettingFacade::allTypes();
        $response['stations']=StationFacade::allStations();
       return view('pages.station.distribution.new')->with($response);
    }
    public function storeDistribution(Request $request)
    {
        DistributionFacade::make($request->all());
        return redirect()->route('admin.distribution')->with('alert-success', 'Order Added Successfully');
    }

    public function viewDistribution($id)
    {
       $response['order']=DistributionFacade::get($id);
       return view('pages.station.distribution.view')->with($response);
    }



    public function completeOrder($id)
    {
        DistributionFacade::update($id,3);
         return redirect()->route('admin.order')->with('alert-success', 'Order Completed Successfully');;
    }

    public function getfuelType(Request $request)
    {
       $product= SettingFacade::getType($request->all()['id']);
       return ['name'=>$product['name'],'price'=>$product['price']];
    }
}
