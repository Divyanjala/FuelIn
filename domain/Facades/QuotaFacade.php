<?php

namespace domain\Facades;

use domain\Quota\QuotaService;
use Illuminate\Support\Facades\Facade;

class QuotaFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return QuotaService::class;
    }
}
