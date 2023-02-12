<?php

namespace domain\Station;

use App\Models\StationFuelType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Stations;
use App\Models\User;

/**
 * Created by Vs COde.
 * Date: 05/07/2022
 * Time: 07:10 PM
 */
class StationService
{
    protected $station;
    protected $user;
    protected $stationType;
    public function __construct()
    {
        $this->user = new User();
        $this->station = new Stations();
        $this->stationType = new StationFuelType();
    }

    /**
     * All Type
     */
    public function allStations()
    {
        return $this->station->orderBy('id', 'desc')->get();
    }

        /**
     * get Type
     */
    public function getStation($id)
    {
        return $this->station->find($id);
    }
    /**
     * Create type
     * @param  $request
     */
    public function stationStore($request)
    {

        $userData['email'] =  $request['email'];
        $userData['name'] =  $request['name'];
        $userData['status'] =  0;
        $userData['user_role'] = 2;
        $randString = "HHDHD#23#";
        $password=Hash::make($randString);
        $userData['password'] = $password;
        $user=$this->user->create($userData);


        //
        $newdata['name'] =  $request['name'];
        // $newdata['code'] =  $request['code'];
        $newdata['des'] =  $request['des'];
        $newdata['district'] =  $request['district'];
        $newdata['user_id'] =  $user->id;
        $newdata['address'] =  $request['address'];
        $newdata['email'] =  $request['email'];
        $newdata['tele'] =  $request['tele'];
        $newdata['account_nb'] =  $request['account_nb'];
        $newdata['manager_tele'] =  $request['manager_tele'];

        $station= $this->station->create($newdata);

        foreach ($request['type_id'] as $value) {
            $fuelType['station_id']=$station->id;
            $fuelType['fuel_type_id']=$value;
            $this->stationType->create($fuelType);
        }
        return $this->station->where('id',$station->id)->update(['code'=>'STTFUEL'.(string)$station->id]);
    }


}
