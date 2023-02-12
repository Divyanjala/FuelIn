<?php

namespace domain\Setting;

// use Illuminate\Support\Facades\Auth;

use App\Models\FuelType;
use App\Models\User;

/**
 * Created by Vs COde.
 * Date: 05/07/2022
 * Time: 07:10 PM
 */
class SettingService
{
    protected $fuelType;
    protected $user;

    public function __construct()
    {
        $this->user = new User();
        $this->fuelType = new FuelType();
    }

    /**
     * All Type
     */
    public function allTypes()
    {
        return $this->fuelType->orderBy('id', 'desc')->get();
    }

        /**
     * get Type
     */
    public function getType($id)
    {
        return $this->fuelType->find($id);
    }
    /**
     * Create type
     * @param  $request
     */
    public function fuelTypestore($request)
    {
        $newdata['name'] =  $request['name'];
        $newdata['code'] =  $request['code'];
        $newdata['des'] =  $request['des'];
        return $this->fuelType->create($newdata);
    }


}
