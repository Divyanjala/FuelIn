<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
        UserFacade::makeRequest($request->all());
        return redirect()->route('user.dashboard')->with('alert-success', 'Order Request Added Successfully');
    }
}
