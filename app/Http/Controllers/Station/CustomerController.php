<?php

namespace App\Http\Controllers\Station;

use App\Models\Customer;
use App\Models\FuelType;
use App\Models\User;
use App\Models\VehicleType;
use domain\Facades\CustomerFacade;
use domain\Facades\QuotaFacade;
use domain\Facades\UserFacade;
use domain\Facades\VehicleFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator as FacadesValidator;
class CustomerController extends ParentController
{
    protected array $resources = [];

    public function index()
    {
        $this->resources['allArr'] = CustomerFacade::getAllCustomers();
        return view('pages.station.customer.index')->with($this->resources);
    }

    public function newView()
    {
        $this->resources['vehicleTypesArr'] = VehicleType::orderBy('name')->get();
        $this->resources['fuelTypesArr'] = FuelType::orderBy('name')->get();
        return view('pages.station.customer.new')->with($this->resources);
    }

    public function customerRequest()
    {
        $resources['requests'] = UserFacade::getStationRequest(Auth::user()->station->id);
        return view('pages.station.request.index')->with($resources);
    }


    public function editView(Request $request)
    {
        $obj = CustomerFacade::getCustomerById($request->id);
        if ($obj != null){
            $this->resources['obj'] = $obj;
            return view('pages.station.customer.edit')->with($this->resources);
        }else{
            return view('pages.station.response.404');
        }
    }


    public function store(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);


        $input = $request->all();
        $cus=QuotaFacade::getCustomerByNic($input['vehical_number']);
        if ($cus) {
            return redirect()->back()->with('alert-danger', 'The NIC has already been taken.');
        }

        $vehical=QuotaFacade::getCustomerByVehical($input['vehical_number']);
        if ($vehical) {
            return redirect()->back()->with('alert-danger', 'The Vehical number has already been taken.');
        }

        $chassis_number=QuotaFacade::getCustomerByChassi($input['chassis_number']);
        if ($chassis_number) {
            return redirect()->back()->with('alert-danger', 'The Chassis number has already been taken.');
        }


        $input['password'] = bcrypt($input['password']);
        $input['user_role']=3;
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
        $success['user_role'] =  $user->user_role;
        $success['id'] =  $user->id;
        $success['email'] =  $user->email;

        //customer
        $customer['full_name']=$input['name'];
        $customer['nic']=$input['nic'];
        $customer['mobile_number']=$input['mobile_number'];
        $customer['vehical_number']=$input['vehical_number'];
        $customer['address']=$input['address'];
        $customer['vehical_type']=$input['vehical_type'];
        $customer['type_id']=$input['vehical_type'];
        $customer['chassis_number']=$input['chassis_number'];
        $customer['fuel_type_id']=$input['fuel_type_id'];
        $customer['user_id']=$user->id;
        $customer['code']='FUEL'.$user->id.'#';
        $cus = Customer::create($customer);


        $vehical=VehicleFacade::getVehicleById($input['vehical_type']);

        $quota['customer_id']=$cus->id;
        $quota['qty']=$vehical->fuel_limit;
        $quota['use_qty']=$vehical->fuel_limit;

        QuotaFacade::quotaStore($quota);

        $userData['name']=$user->name;
        $userData['password_gmail']=$input['c_password'];
        $userData['email']=$user->email;
        $userData['customer_id']=$cus->id;
        $userData['qty']=$vehical->fuel_limit;
        $userData['use_qty']=$vehical->use_qty;
        Mail::to($user->email)->send(new \App\Mail\RegisterEmail($userData));

        return redirect()->route('station.customers')->with('alert-success', 'Customer info updated successfully!');
    }


    public function edit(Request $request)
    {
        $requestParams = $request->all();

        $rules = [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'address' => ['required'],
            'telephone' => ['required'],
            'nic' => ['required']
        ];

        $validatorEmployee = Validator::make($requestParams, $rules, $this->messages());
        if (!$validatorEmployee->fails()) {

            CustomerFacade::updateCustomer($requestParams);
            return redirect()->route('station.customers')->with('alert-success', 'Customer info updated successfully!');

        }else{
            return redirect()->back()->withErrors($validatorEmployee)->withInput($request->all());
        }
    }


    /**
     * Validation messages.
     * @return string[]
     */
    protected function messages()
    {
        return [
            'first_name.required' => 'Please enter first name.',
            'last_name.required' => 'Please enter last name.',
            'first_name.max' => 'First name may not be greater than 100 characters.',
            'last_name.max' => 'Last name may not be greater than 100 characters.',
            'email.unique' => 'This email is already connected to an account.'
        ];
    }


    public function sendEmail(Request $request)
    {
        $data=$request->all();
        $quotas=UserFacade::getPendingRequests(Auth::user()->station->id);

        foreach ($quotas as $quota) {
            if ($data['type']==1) {
                Mail::to($quota->customer->user->email)
                ->send(new \App\Mail\stockEmail($quota->customer->user));
            } else {
                Mail::to($quota->customer->user->email)
                ->send(new \App\Mail\ReminderEmail($quota));
            }
        }

        return redirect()->route('station.notification')->with('alert-success', 'Customer Notification Send successfully!');

    }
}
