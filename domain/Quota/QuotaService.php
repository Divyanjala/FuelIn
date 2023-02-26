<?php

namespace domain\Quota;

use App\Models\Customer;
use App\Models\CustomerQuota;
use App\Models\CustomerQuotaRequest;
use App\Models\User;
use App\Models\VehicleType;

// use Illuminate\Support\Facades\Auth;


/**
 * Created by Vs COde.
 * Date: 05/07/2022
 * Time: 07:10 PM
 */
class QuotaService
{
    protected $quota;
    protected $user;
    protected $vehical_type;
    protected $customer;
    protected $customer_request;

    public function __construct()
    {
        $this->user = new User();
        $this->quota = new CustomerQuota();
        $this->customer = new Customer();
        $this->vehical_type = new VehicleType();
        $this->customer_request = new CustomerQuotaRequest();
    }

    /**
     * All quota
     */
    public function allQuota()
    {
        return $this->quota->orderBy('id', 'desc')->get();
    }


        /**
     * get quota
     */
    public function getQuota($id)
    {
        return $this->quota->find($id);
    }

    /**
     * get quota
     */
    public function getQuotaByCustomer($id)
    {
        return $this->quota->where('customer_id',$id)->first();
    }

        /**
     * get quota
     */
    public function getCustomer($id)
    {
        $customer['customer']= $this->customer->where('user_id',$id)->first();
        $customer['user']= $this->user->find($customer['customer']->user_id);
        $customer['quota']= $customer['customer']->quota;
        return $customer;
    }

    /**
     * Create type
     * @param  $request
     */
    public function quotaStore($request)
    {
        $newdata['customer_id'] =  $request['customer_id'];
        $newdata['qty'] =  $request['qty'];
        $newdata['use_qty'] =  0;
        return $this->quota->create($newdata);
    }

    public function quotaUpdate($request,$id)
    {
        $newdata['use_qty'] =  $request['qty'];
        return $this->quota->where('customer_id',$id)->update($newdata);
    }

    public function quotaStatusUpdate($request,$id)
    {
        $newdata['use_qty'] =  $request['qty'];
        $newdata['status'] = 1;
        return $this->quota->where('customer_id',$id)->update($newdata);
    }

       /**
     * All nic
     */
    public function getCustomerByNic($nic)
    {
        return $this->customer->where('nic', $nic)->first();
    }

           /**
     * All vehical
     */
    public function getCustomerByVehical($nic)
    {
        return $this->customer->where('vehical_number', $nic)->first();
    }


           /**
     * All vehical
     */
    public function getCustomerByChassi($num)
    {
        return $this->customer->where('chassis_number', $num)->first();
    }


        /**
     * get quota
     */
    public function allQuotaReset($hidden_id)
    {
        if ($hidden_id=='FUILINSRILANKA') {
            $quota_details= $this->quota->all();//reset customer quota of week
            if ($quota_details!=null) {
                foreach ($quota_details as  $quota) {
                    $quota->use_qty=0;
                    $quota->save();
                }
            }

            $quota_request= $this->customer_request->where('status',0)->get();
            if ($quota_request!=null) {
                foreach ($quota_request as $request) {
                    $request->status=2;
                    $request->save();
                }
            }
        }


    }
}
