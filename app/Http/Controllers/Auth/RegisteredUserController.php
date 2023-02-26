<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\FuelType;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\VehicleType;
use App\Providers\RouteServiceProvider;
use domain\Facades\QuotaFacade;
use domain\Facades\VehicleFacade;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $resources['vehicleTypesArr'] = VehicleType::orderBy('name')->get();
        $resources['fuelTypesArr'] = FuelType::orderBy('name')->get();
        return view('auth.register')->with($resources);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $cus=QuotaFacade::getCustomerByNic($request['vehical_number']);
        if ($cus) {
            return redirect()->route('register')->with('alert-danger', 'The NIC has already been taken.');

        }

        $vehical=QuotaFacade::getCustomerByVehical($request['vehical_number']);
        if ($vehical) {
            return redirect()->route('register')->with('alert-danger', 'The Vehical number has already been taken.');
        }

        $chassis_number=QuotaFacade::getCustomerByChassi($request['chassis_number']);
        if ($chassis_number) {
            return redirect()->route('register')->with('alert-danger', 'The Chassis number has already been taken.');
          
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_role' =>3
        ]);

        $customer['full_name']=$request['name'];
        $customer['nic']=$request['nic'];
        $customer['mobile_number']=$request['mobile_number'];
        $customer['vehical_number']=$request['vehical_number'];
        $customer['address']=$request['address'];
        $customer['vehical_type']=$request['vehical_type'];
        $customer['type_id']=$request['vehical_type'];
        $customer['chassis_number']=$request['chassis_number'];
        $customer['fuel_type_id']=$request['fuel_type_id'];
        $customer['user_id']=$user->id;
        $customer['code']='FUEL'.$user->id.'#';
        $cus = Customer::create($customer);

        $vehical=VehicleFacade::getVehicleById($request->vehical_type);

        $quota['customer_id']=$cus->id;
        $quota['qty']=$vehical->fuel_limit;
        $quota['use_qty']=$vehical->fuel_limit;

        QuotaFacade::quotaStore($quota);

        $userData['name']=$user->name;
        $userData['password_gmail']=$request['c_password'];
        $userData['email']=$user->email;
        $userData['customer_id']=$cus->id;
        $userData['qty']=$vehical->fuel_limit;
        $userData['use_qty']=$vehical->use_qty;
        Mail::to($user->email)->send(new \App\Mail\RegisterEmail($userData));

        Auth::login($user);
        return redirect(route('user.dashboard'));
        // if (Auth::user()->user_role == User::TYPES['USER']) {
        //     return redirect(route('user.dashboard'));
        // }

        // if (Auth::user()->user_role == User::TYPES['ADMIN']) {
        //     return redirect(route('admin.dashboard'));
        // }

        // if (Auth::user()->user_role == User::TYPES['STATION']) {
        //     return redirect(route('station.dashboard'));
        // }
        // return redirect(RouteServiceProvider::HOME);
    }
}
