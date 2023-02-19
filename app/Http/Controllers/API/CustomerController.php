<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use domain\Facades\QuotaFacade;
use domain\Facades\UserFacade;
use Illuminate\Http\Request;

class CustomerController extends BaseController
{
    public function customerQuota($id)
    {

        $response['quota']=QuotaFacade::getQuotaByCustomer($id);
        return $this->sendResponse($response, 'customer_data');
    }

    public function customer($id)
    {
        $response['customer']=QuotaFacade::getCustomer($id);
        return $this->sendResponse($response, 'customer_data');
    }

    public function station($id)
    {
        $response['user']=UserFacade::get($id);
       $response['staion']=$response['user']->station;
        return $this->sendResponse($response, 'customer_data');
    }
}
