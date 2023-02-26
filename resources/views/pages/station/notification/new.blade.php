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
    <form action="{{ route('station.send.notification') }}" method="post">
        @csrf
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name"><b>Notification Type</b></label>
                                    <select name="tyepe" id="" class="form-control form-control-alternative" >
                                        <option value="1">scheduled fuel stock is finished</option>
                                        <option value="2">Reminder with amount requested</option>
                                    </select>

                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <h6 class="text-center responsive-moblile">
                                        <button id="submit-btn" type="submit" class="btn btn-primary di">
                                            Send Email
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
