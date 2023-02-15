<?php

namespace domain\Facades;

use domain\Station\VehicleService;
use Illuminate\Support\Facades\Facade;

class VehicleFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VehicleService::class;
    }
}
