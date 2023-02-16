<?php

namespace domain\Station;

use App\Models\Customer;
use App\Models\FuelType;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

/**
 * Created by Tharindu.
 * Date: 01/02/2023
 * Time: 07:10 PM
 */
class CustomerService
{
    protected $user;
    protected $customer;
    protected $vehicle;

    public function __construct()
    {
        $this->user = new User();
        $this->customer = new Customer();
        $this->vehicle = new Vehicle();
    }

    /**
     * Add new customer
     * @param $data
     * @return bool
     */
    public function addCustomer($data) : bool
    {
        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $data['first_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['mobile_number']),
                'user_role' => 3
            ]);

            $vehicleType = VehicleType::find($data['type_id']);

            $fullName = $data['first_name'].' '.$data['last_name'];

            $this->customer->create([
                'user_id' => $user['id'],
                'address' => $data['address'],
                'nic' => $data['nic'],
                'full_name' => $fullName,
                'mobile_number' => $data['mobile_number'],
                'code' => 'FUEL'.$user->id.'#',
                'vehical_number' => $data['registration_number'],
                'vehical_type' => $vehicleType['name'],
                'type_id' => $data['type_id'],
                'chassis_number' => $data['chassis_number'],
                'fuel_type_id' => $data['fuel_type_id'],
            ]);

            DB::commit();

//            $userData['name'] = $user->name;
//            $userData['password_gmail'] = $data['c_password'];
//            $userData['email'] = $user->email;
//            Mail::to($user->email)->send(new \App\Mail\RegisterEmail($userData));

            return true;

        }catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }


    /**
     * Update customer info
     * @param $data
     * @return bool
     */
    public function updateCustomer($data) : bool
    {
        try {
            DB::beginTransaction();
            $customer = $this->customer->find($data['id']);

            $this->customer->find($data['id'])->update([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'address' => $data['address'],
                'telephone' => $data['telephone'],
                'nic' => $data['nic']
            ]);

            $this->user->find($customer['user_id'])->update([
                'name' => $data['first_name'],
                'email' => $data['email']
            ]);

            DB::commit();
            return true;

        }catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }


    /**
     * Get all customers
     */
    public function getAllCustomers()
    {
        return $this->customer->with('user')->orderByDesc('id')->get();
    }

    /**
     * Get customer by id
     */
    public function getCustomerById($id)
    {
        return $this->customer->with('user')->find($id);
    }

}
