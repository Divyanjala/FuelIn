<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use domain\Facades\QuotaFacade;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customerQuota()
    {
        $response['quota']=QuotaFacade::allTypes();
        return $this->sendResponse($response, 'Fuel Types.');
    }
}
