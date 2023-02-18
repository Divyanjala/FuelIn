<?php

namespace domain\Station;

use App\Models\Vehicle;
use App\Models\VehicleType;
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
        $this->vehicle = new VehicleType();
    }



    /**
     * Get vehicle by id
     */
    public function getVehicleById($id)
    {
        return $this->vehicle->find($id);
    }

}
