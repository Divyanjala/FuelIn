<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use domain\Facades\SettingFacade;

class CommonController extends BaseController
{
    public function types()
    {
        $response['types']=SettingFacade::allTypes();
        return $this->sendResponse($response, 'Fuel Types.');
    }

    public function vehicalTypes()
    {
        $response['vehical_types']=SettingFacade::allVehicalTypes();
        return $this->sendResponse($response, 'Vehical Types.');
    }
}
