<?php

namespace domain\Station;

use App\Models\FuelType;
use App\Models\VehicleType;

/**
 * Created by Tharindu.
 * Date: 01/02/2023
 * Time: 07:10 PM
 */
class UtilityService
{
    protected $fuelType;
    protected $vehicleType;

    public function __construct()
    {
        $this->fuelType = new FuelType();
        $this->vahicleType = new VehicleType();
    }

    /**
     * Get all fuel types
     */
    public function getAllFuelTypes()
    {
        return $this->fuelType->orderBy('name')->get();
    }


    /**
     * Get all vehicle types
     */
    public function getAllVehicleTypes()
    {
        return $this->vehicleType->orderBy('name')->get();
    }

}
