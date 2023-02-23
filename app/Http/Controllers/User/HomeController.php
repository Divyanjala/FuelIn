<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use domain\Facades\QuotaFacade;
use domain\Facades\StationFacade;
use domain\Facades\UserFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends ParentController
{
    /**
     * Home
     */
    public function index()
    {
        $response['user']=Auth::user();
        $response['stations']=StationFacade::allStations();
        $response['requests']=UserFacade::getRequest(Auth::user()->user->id);
        return view('pages.user.view')->with($response);
    }

    public function storeRequest(Request $request)
    {
        $data = $request->all();
        $user=QuotaFacade::getQuotaByCustomer($data['customer_id']);
  
        if (($user->qty-$user->use_qty)<$data['qty']) {
            return redirect()->route('user.dashboard')->with('alert-warning', 'Please check the balance weekly Quota');
        }
        UserFacade::makeRequest($request->all());
        QuotaFacade::quotaUpdate($data,$data['customer_id']);
        return redirect()->route('user.dashboard')->with('alert-success', 'Order Request Added Successfully');
    }
}
