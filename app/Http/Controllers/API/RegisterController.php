<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Customer;
use App\Models\User;
use domain\Facades\QuotaFacade;
use domain\Facades\VehicleFacade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Validator;

class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['user_role']=3;
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
        $success['user_role'] =  $user->user_role;
        $success['id'] =  $user->id;
        $success['email'] =  $user->email;

        //customer
        $customer['full_name']=$input['name'];
        $customer['nic']=$input['nic'];
        $customer['mobile_number']=$input['mobile_number'];
        $customer['vehical_number']=$input['vehical_number'];
        $customer['address']=$input['address'];
        $customer['vehical_type']=$input['vehical_type'];
        $customer['type_id']=$input['vehical_type'];
        $customer['chassis_number']=$input['chassis_number'];
        $customer['fuel_type_id']=$input['fuel_type_id'];
        $customer['user_id']=$user->id;
        $customer['code']='FUEL'.$user->id.'#';
        $cus = Customer::create($customer);


        $vehical=VehicleFacade::getVehicleById($input['vehical_type']);

        $quota['customer_id']=$cus->id;
        $quota['qty']=$vehical->fuel_limit;
        $quota['use_qty']=$vehical->fuel_limit;

        QuotaFacade::quotaStore($quota);

        $userData['name']=$user->name;
        $userData['password_gmail']=$input['c_password'];
        $userData['email']=$user->email;
        $userData['customer_id']=$cus->id;
        $userData['qty']=$vehical->fuel_limit;
        $userData['use_qty']=$vehical->use_qty;
        Mail::to($user->email)->send(new \App\Mail\RegisterEmail($userData));

        return $this->sendResponse($success, 'User register successfully.');
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            $success['name'] =  $user->name;
            $success['user_role'] =  $user->name;

            $success['customer_id']=$user->user->id;
            $success['qty']=$user->user->quota->qty;
            $success['use_qty']=$user->user->quota->use_qty;
            return $this->sendResponse($success, 'User login successfully.');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }
}
