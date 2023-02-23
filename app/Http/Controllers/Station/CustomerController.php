<?php

namespace App\Http\Controllers\Station;

use App\Models\FuelType;
use App\Models\VehicleType;
use domain\Facades\CustomerFacade;
use domain\Facades\UserFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $requestParams = $request->all();

        $rules = [
            'first_name' => ['required', 'string', 'max:200'],
            'last_name' => ['required', 'string', 'max:200'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required'],
            'mobile_number' => ['required'],
            'registration_number' => ['required'],
            'type_id' => ['required'],
            'chassis_number' => ['required'],
            'fuel_type_id' => ['required'],
            'nic' => ['required'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        $validatorEmployee = Validator::make($requestParams, $rules, $this->messages());
        if (!$validatorEmployee->fails()) {

            CustomerFacade::addCustomer($requestParams);
            return redirect()->route('station.customers')->with('alert-success', 'Customer added successfully!');

        }else{
            return redirect()->back()->withErrors($validatorEmployee)->withInput($request->all());
        }
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
}
