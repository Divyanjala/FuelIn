<?php

namespace domain\Facades;

use domain\Station\StationService;
use Illuminate\Support\Facades\Facade;

/**
 * Created by Vs COde.
 * Date: 05/07/2022
 * Time: 07:10 PM
 */
class StationFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StationService::class;
    }
}
