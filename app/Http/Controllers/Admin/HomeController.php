<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use domain\Facades\DistributionFacade;
use domain\Facades\UserFacade;
use Illuminate\Http\Request;

class HomeController extends ParentController
{
   public function index()
   {
    $response['monthEarn']=DistributionFacade::paymentMonthly();
    $response['annualEarn']=DistributionFacade::paymentAnnualy();
    $response['chartdata']=DistributionFacade::chartdata();
    $response['stations']=UserFacade::allStationCount();
    $response['allOrders']=DistributionFacade::allOrderCount();
    $response['pendingOrders']=DistributionFacade::allPendingOrderCount();
    $response['percentage']=($response['pendingOrders']/$response['allOrders'])*100;
      return view('pages.admin.dashboard')->with($response);
   }
}
