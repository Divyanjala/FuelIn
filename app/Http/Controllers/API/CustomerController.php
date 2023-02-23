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

    public function customerQuotaUpdate(Request $request)
    {

        $data = $request->all();
        $user=UserFacade::get($data['user_id']);
        if (($user->user->quota->qty-$user->user->quota->use_qty)<$data['qty']) {
            return $this->sendError('Please check the balance weekly Quota', []);
        }
       // QuotaFacade::quotaUpdate($data,$user->user->id);
        $quota=QuotaFacade::getQuotaByCustomer($user->user->id);
        return $this->sendResponse($quota, 'User Quota update successfully.');
        // return $this->sendResponse($response, 'customer_data');
    }
}
