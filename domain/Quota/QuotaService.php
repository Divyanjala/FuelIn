<?php

namespace domain\Quota;

use App\Models\Customer;
use App\Models\CustomerQuota;
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
    public function __construct()
    {
        $this->user = new User();
        $this->quota = new CustomerQuota();
        $this->customer = new Customer();
        $this->vehical_type = new VehicleType();
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
}
