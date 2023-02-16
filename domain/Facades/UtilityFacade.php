<?php

namespace domain\Facades;

use domain\Station\UtilityService;
use Illuminate\Support\Facades\Facade;

class UtilityFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UtilityService::class;
    }
}
