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
                            <input name="telephone" value="{{old('telephone')}}" type="tel" class="form-control @error('telephone')is-invalid @enderror">
                            @error('telephone')<span class="small text-danger">{{ $message }}</span>@enderror
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
