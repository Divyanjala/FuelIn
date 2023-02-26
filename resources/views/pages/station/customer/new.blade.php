@extends('layouts.station')
@section('title')
    <title>Station | Customer Management</title>
@endsection
@section('header')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">New Customer</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card p-3">
            <form action="{{ route('station.customers.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">First Name</label>
                            <input name="first_name" value="{{old('first_name')}}" type="text" class="form-control @error('first_name')is-invalid @enderror">
                            @error('first_name')<span class="small text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Last Name</label>
                            <input name="last_name" value="{{old('last_name')}}" type="text" class="form-control @error('last_name')is-invalid @enderror">
                            @error('last_name')<span class="small text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Address</label>
                            <input name="address" value="{{old('address')}}" type="text" class="form-control @error('address')is-invalid @enderror">
                            @error('address')<span class="small text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Email</label>
                            <input name="email" value="{{old('email')}}" type="text" class="form-control @error('email')is-invalid @enderror">
                            @error('email')<span class="small text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Telephone</label>
                            <input name="mobile_number" value="{{old('mobile_number')}}" type="tel" class="form-control @error('mobile_number')is-invalid @enderror">
                            @error('mobile_number')<span class="small text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">NIC</label>
                            <input name="nic" value="{{old('nic')}}" type="text" class="form-control @error('nic')is-invalid @enderror">
                            @error('nic')<span class="small text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Vehicle Type</label>
                            <select name="type_id" class="form-control @error('type_id')is-invalid @enderror">
                                <option value="">- Select Vehicle Type -</option>
                                @foreach($vehicleTypesArr as $vehicleType)
                                    <option @if($vehicleType['id'] == old('type_id')) selected @endif value="{{$vehicleType['id']}}">{{$vehicleType['name']}}</option>
                                @endforeach
                            </select>
                            @error('type_id')<span class="small text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Fuel Type</label>
                            <select name="fuel_type_id" class="form-control @error('fuel_type_id')is-invalid @enderror">
                                <option value="">- Select Fuel Type -</option>
                                @foreach($fuelTypesArr as $fuelType)
                                    <option @if($fuelType['id'] == old('fuel_type_id')) selected @endif value="{{$fuelType['id']}}">{{$fuelType['name']}}</option>
                                @endforeach
                            </select>
                            @error('fuel_type_id')<span class="small text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Registration Number</label>
                            <input name="registration_number" value="{{old('registration_number')}}" type="text" class="form-control @error('registration_number')is-invalid @enderror">
                            @error('registration_number')<span class="small text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Engine Number</label>
                            <input name="engine_number" value="{{old('engine_number')}}" type="text" class="form-control @error('engine_number')is-invalid @enderror">
                            @error('engine_number')<span class="small text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Chassis Number</label>
                            <input name="chassis_number" value="{{old('chassis_number')}}" type="text" class="form-control @error('chassis_number')is-invalid @enderror">
                            @error('chassis_number')<span class="small text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Vehical Number</label>
                            <input name="vehical_number" value="{{old('vehical_number')}}" type="text" class="form-control @error('vehical_number')is-invalid @enderror">
                            @error('vehical_number')<span class="small text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="font-weight-bold">Password</label>
                        <input type="password" class="form-control"
                            id="exampleInputPassword" placeholder="Password" name="password">
                    </div>
                    <div class="col-sm-6">
                        <label class="font-weight-bold">Confirm Password</label>
                        <input type="password" class="form-control "
                            id="exampleRepeatPassword" placeholder="Repeat Password"
                            name="password_confirmation">
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="form-group">
                            <h6 class="text-right responsive-moblile">
                                <button id="submit-btn" type="submit" class="btn btn-primary di">
                                    Save
                                </button>
                            </h6>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
