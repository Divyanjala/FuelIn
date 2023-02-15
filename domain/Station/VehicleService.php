<?php

namespace domain\Station;

use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Created by Tharindu.
 * Date: 01/02/2023
 * Time: 07:10 PM
 */
class VehicleService
{
    protected $vehicle;

    public function __construct()
    {
        $this->vehicle = new Vehicle();
    }

    /**
     * Add new customer
     * @param $data
     * @return bool
     */
    public function addVehicle($data) : bool
    {
        $this->vehicle->create([
            'type_id' => $data['type_id'],
            'fuel_type_id' => $data['fuel_type_id'],
            'customer_id' => $data['customer_id'],
            'registration_number' => $data['registration_number'],
            'engine_number' => $data['engine_number'],
            'chassis_number' => $data['chassis_number']
        ]);

        return true;
    }


    /**
     * Update customer info
     * @param $data
     * @return bool
     */
    public function updateVehicle($data) : bool
    {
        $this->vehicle->find($data['id'])->update([
            'type_id' => $data['type_id'],
            'fuel_type_id' => $data['fuel_type_id'],
            'customer_id' => $data['customer_id'],
            'registration_number' => $data['registration_number'],
            'engine_number' => $data['engine_number'],
            'chassis_number' => $data['chassis_number']
        ]);

        return true;
    }


    /**
     * Get all vehicles by customer id
     */
    public function getAllVehiclesByCustomerId($id)
    {
        return $this->vehicle->with('vehicleType', 'fuelType')
            ->where('customer_id', $id)->orderByDesc('id')->get();
    }

    /**
     * Get vehicle by id
     */
    public function getVehicleById($id)
    {
        return $this->vehicle->find($id);
    }

}
