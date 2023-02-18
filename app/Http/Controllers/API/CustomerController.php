<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use domain\Facades\QuotaFacade;
use Illuminate\Http\Request;

class CustomerController extends BaseController
{
    public function customerQuota($id)
    {
        $response['quota']=QuotaFacade::getQuotaByCustomer($id);
        return $this->sendResponse($response, 'customer_data');
    }
}
