<?php

namespace App\Http\Controllers\Station;

use App\Http\Controllers\Controller;
use domain\Facades\UserFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $response['pendingRequest']=UserFacade::getRequestCount(Auth::user()->station->id);
       return view('pages.station.dashboard')->with($response);
    }
}
