<?php

namespace domain\Facades;

use domain\Station\CustomerService;
use Illuminate\Support\Facades\Facade;

class CustomerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CustomerService::class;
    }
}
