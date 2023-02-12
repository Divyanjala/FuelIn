<?php

namespace domain\Station;


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

    public function __construct()
    {
        $this->user = new User();
        $this->station = new Stations();
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
    public function stationstore($request)
    {
        $newdata['name'] =  $request['name'];
        $newdata['code'] =  $request['code'];
        $newdata['des'] =  $request['des'];
        return $this->station->create($newdata);
    }


}
