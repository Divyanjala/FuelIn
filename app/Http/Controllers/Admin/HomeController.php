<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use domain\Facades\DistributionFacade;
use Illuminate\Http\Request;

class HomeController extends ParentController
{
   public function index()
   {
    $response['monthEarn']=DistributionFacade::paymentMonthly();
    $response['annualEarn']=DistributionFacade::paymentAnnualy();
    $response['chartdata']=DistributionFacade::chartdata();
      return view('pages.admin.dashboard')->with($response);
   }
}
