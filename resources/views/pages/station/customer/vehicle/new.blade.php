@extends('layouts.station')
@section('title')
    <title>Station | Customer Management</title>
@endsection
@section('header')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">New Vehicle</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card p-3">
            <form action="{{ route('station.customers.vehicle.store', request('customer_id')) }}" method="post">
                @csrf
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Chassis Number</label>
                            <input name="chassis_number" value="{{old('chassis_number')}}" type="text" class="form-control @error('chassis_number')is-invalid @enderror">
                            @error('chassis_number')<span class="small text-danger">{{ $message }}</span>@enderror
                        </div>
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
