<?php

namespace domain\Distribution;

// use Illuminate\Support\Facades\Auth;

use App\Models\DistributionItem;
use App\Models\Distribution;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

/**
 * Created by Vs COde.
 * Date: 05/07/2022
 * Time: 07:10 PM
 */
class DistributionService
{

    protected $distribution;
    protected $distribution_item;

    public function __construct()
    {
        $this->distribution = new Distribution();
        $this->distribution_item = new DistributionItem();
    }

    /**
     * All distribution
     */
    public function all()
    {
        return $this->distribution->orderBy('id', 'desc')->get();
    }

    /**
     * get distribution
     */
    public function get($id)
    {
        return $this->distribution->find($id);
    }

    /**
     * get distribution
     */
    public function getByStation($id)
    {
        return $this->distribution->where('station_id',$id)->get();
    }
       /**
     * Make user Array
     * @param array $data
     * @return mixed
     */
    public function make($data)
    {

        $count=count($data['fuel_type_id']);
        $data['created_by']=Auth::user()->id;
        $data['status']=Distribution::STATUS['PENDING'];
        $distribution= $this->distribution->create($data);
        $amount=0;
        for ($i=0; $i < $count ; $i++) {
            $price=floatval($data['qty'][$i])*floatval($data['price'][$i]);
            $amount+=$price;
           $obj=[
            'qty'=>$data['qty'][$i],
            'fuel_type_id'=>$data['fuel_type_id'][$i],
            'amount'=>$price,
            'distribution_id'=>$distribution->id
           ];
           $this->distribution_item->create($obj);
        }
        $distribution= $this->distribution->where('id',$distribution->id)->update(['amount'=>$amount]);
        return $distribution;
    }
    public function updateDistributionItem($id)
    {
        $distribution= $this->distribution_item->where('id',$id)->update(['store_status'=>1]);
        return $distribution;
    }

    public function update($id,$status)
    {
        $distribution= $this->distribution->where('id',$id)->update(['status'=>$status]);
        return $distribution;
    }


           /**
     * get store
     */
    public function approve($id)
    {

        return $this->distribution->where('id',$id)->update(['status'=>1,'approved_by'=>Auth::user()->id]);
    }

       /**
     * All payment
     */
    public function paymentMonthly()
    {
        $startDate = Carbon::now(); //returns current day
        $firstDay = $startDate->firstOfMonth()->format('Y-m-d');
        $lastDay = $startDate->lastOfMonth()->format('Y-m-d');
        return $this->distribution->orWhereBetween('created_at', [$firstDay, $lastDay])->sum('amount');
    }


      /**
     * All payment
     */
    public function paymentAnnualy()
    {
        $startDate = Carbon::now(); //returns current day
        $firstDay = $startDate->firstOfYear()->format('Y-m-d');
        $lastDay = $startDate->lastOfYear()->format('Y-m-d');
        return $this->distribution->orWhereBetween('created_at', [$firstDay, $lastDay])->sum('amount');
    }

        /**
     * All payment
     */
    public function chartdata()
    {
        $array = [];
        // return $arra
        $startDate = Carbon::now(); //returns current day
        $firstDay = $startDate->firstOfMonth()->format('Y-m-d');
        $lastDay = $startDate->lastOfMonth()->format('Y-m-d');
        $sum=$this->distribution->orWhereBetween('created_at', [$firstDay, $lastDay])->sum('amount');
        array_push($array, $sum);

        for ($i=1; $i <12 ; $i++) {
            $newDateTime = Carbon::now()->addMonths($i);
            $firstDay = $newDateTime->firstOfMonth()->format('Y-m-d');
            $lastDay = $newDateTime->lastOfMonth()->format('Y-m-d');
            $sum=$this->distribution->orWhereBetween('created_at', [$firstDay, $lastDay])->sum('amount');
            array_push($array, $sum);
        }

        return $array;
    }

}
