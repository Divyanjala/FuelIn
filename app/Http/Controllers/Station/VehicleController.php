<?php

namespace App\Http\Controllers\Station;

use App\Http\Controllers\Controller;
use App\Models\FuelType;
use App\Models\VehicleType;
use domain\Facades\CustomerFacade;
use domain\Facades\UtilityFacade;
use domain\Facades\VehicleFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    protected array $resources = [];

    public function index(Request $request)
    {
        $obj = CustomerFacade::getCustomerById($request->customer_id);
        if ($obj != null){
            $this->resources['customer'] = $obj;
            $this->resources['allArr'] = VehicleFacade::getAllVehiclesByCustomerId($request->customer_id);
            return view('pages.station.customer.vehicle.index')->with($this->resources);
        }else{
            return view('pages.station.response.404');
        }
    }

    public function newView()
    {
//        $this->resources['vehicleTypesArr'] = UtilityFacade::getAllVehicleTypes();
//        $this->resources['fuelTypesArr'] = UtilityFacade::getAllFuelTypes();

        $this->resources['vehicleTypesArr'] = VehicleType::orderBy('name')->get();
        $this->resources['fuelTypesArr'] = FuelType::orderBy('name')->get();
        return view('pages.station.customer.vehicle.new')->with($this->resources);
    }

    public function editView(Request $request)
    {
        $obj = VehicleFacade::getVehicleById($request->id);
        if ($obj != null){
            $this->resources['obj'] = $obj;
            return view('pages.station.customer.vehicle.edit')->with($this->resources);
        }else{
            return view('pages.station.response.404');
        }
    }


    public function store(Request $request)
    {
        $requestParams = $request->all();

        $rules = [
            'type_id' => ['required'],
            'fuel_type_id' => ['required'],
            'registration_number' => ['required'],
            'engine_number' => ['required'],
            'chassis_number' => ['required'],
        ];

        $validatorEmployee = Validator::make($requestParams, $rules, $this->messages());
        if (!$validatorEmployee->fails()) {

            $requestParams['customer_id'] = $request->customer_id;
            VehicleFacade::addVehicle($requestParams);
            return redirect()->route('station.customers.vehicle', $request->customer_id)->with('alert-success', 'Vehicle added successfully!');

        }else{
            return redirect()->back()->withErrors($validatorEmployee)->withInput($request->all());
        }
    }


    public function edit(Request $request)
    {
        $requestParams = $request->all();

        $rules = [
            'type_id' => ['required'],
            'fuel_type_id' => ['required'],
            'customer_id' => ['required'],
            'registration_number' => ['required'],
            'engine_number' => ['required'],
            'chassis_number' => ['required'],
        ];

        $validatorEmployee = Validator::make($requestParams, $rules, $this->messages());
        if (!$validatorEmployee->fails()) {

            VehicleFacade::updateVehicle($requestParams);
            return redirect()->route('station.customers.vehicle', $request->customer_id)->with('alert-success', 'Vehicle info updated successfully!');

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
            'type_id.required' => 'Please select vehicle type.',
            'fuel_type_id.required' => 'Please select fuel type.',
            'registration_number.required' => 'Please enter registration number.',
            'engine_number.required' => 'Please enter engine number.',
            'chassis_number.required' => 'Please enter chassis number.',
        ];
    }
}
