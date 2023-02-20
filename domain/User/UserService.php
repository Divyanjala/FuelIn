<?php

namespace domain\User;

// use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserFine;
use App\Events\ReplyEvent;
use App\Models\CustomerQuotaRequest;
use Carbon\Carbon;

/**
 * Created by Vs COde.
 * Date: 05/07/2022
 * Time: 07:10 PM
 */
class UserService
{

    protected $user;
    protected $customer_request;

    public function __construct()
    {
        $this->customer_request = new CustomerQuotaRequest();

    }

    /**
     * All user
     */
    public function all()
    {
        return $this->user->where('user_role',0)->orderBy('id', 'desc')->get();
    }
    /**
     * get user
     */
    public function get($id)
    {
        return $this->user->find($id);
    }
    public function getRequest($id)
    {

        return $this->customer_request
        ->where('customer_id',$id)->orderBy('id', 'desc')->get();
    }
    public function makeRequest($data)
    {

        $userData['date'] = Carbon::now();
        $userData['qty'] = $data['qty'];
        $userData['customer_id'] = $data['customer_id'];
        $userData['station_id'] = $data['station_id'];
        $userData['quota_index'] = 1;
        $user=$this->customer_request->create($userData);
        return $user;
    }


}
