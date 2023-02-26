@extends('layouts.station')
@section('title')
<title>Customer Notification</title>
@endsection
@section('header')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">New Customer Notification</h1>

</div>
@endsection

@section('content')
<div class="container-fluid">
    <form action="{{ route('admin.fuel-type.store') }}" method="post">
        @csrf
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="name"><b>Type Name</b></label>
                                    <input type="text" class="form-control form-control-alternative" name="name"
                                        id="name" aria-describedby="helpId" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="name"><b>Type Code</b></label>
                                    <input type="text" class="form-control form-control-alternative" name="code"
                                        id="code" aria-describedby="helpId" placeholder="" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <h6 class="text-center responsive-moblile">
                                        <button id="submit-btn" type="submit" class="btn btn-primary di">
                                            Save Type
                                        </button>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
