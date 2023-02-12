@extends('layouts.admin')
@section('title')
    <title>Admin-New Fuel Station</title>
@endsection
@section('header')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">New Fuel Station</h1>

    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{ route('admin.station.store') }}" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <label for="name"><b>Station Name</b></label>
                                        <input type="text" class="form-control form-control-alternative" name="name"
                                            id="name" aria-describedby="helpId" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label for="name"><b>District</b></label>
                                        <select class="form-control" id="district" name="district">
                                            <option value="Ampara">Ampara</option>
                                            <option value="Anuradhapura">Anuradhapura</option>
                                            <option value="Badulla">Badulla</option>
                                            <option value="Batticaloa">Batticaloa</option>
                                            <option value="Colombo">Colombo</option>
                                            <option value="Galle">Galle</option>
                                            <option value="Gampaha">Gampaha</option>
                                            <option value="Hambantota">Hambantota</option>
                                            <option value="Jaffna">Jaffna</option>
                                            <option value="Kalutara">Kalutara</option>
                                            <option value="Kandy">Kandy</option>
                                            <option value="Kegalle">Kegalle</option>
                                            <option value="Kilinochchi">Kilinochchi</option>
                                            <option value="Kurunegala">Kurunegala</option>
                                            <option value="Mannar">Mannar</option>
                                            <option value="Matale">Matale</option>
                                            <option value="Matara">Matara</option>
                                            <option value="Moneragala">Moneragala</option>
                                            <option value="Nuwara Eliya">Nuwara Eliya</option>
                                            <option value="Puttalam">Puttalam</option>
                                            <option value="Ratnapura">Ratnapura</option>
                                            <option value="Trincomalee">Trincomalee</option>
                                            <option value="Vavuniya">Vavuniya</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="address"><b>Station Address</b></label>
                                        <input type="text" class="form-control form-control-alternative" name="address"
                                            id="address" aria-describedby="helpId" placeholder="" required>
                                            @if($errors->has('address'))
                                            <div class="error">{{ $errors->first('address') }}</div>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="name"><b>Telephone</b></label>
                                        <input type="text" class="form-control form-control-alternative" name="tele"
                                            id="tele" aria-describedby="helpId" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <label for="name"><b>Fuel type</b></label>
                                        <select class="form-control" id="type_id" name="type_id[]" multiple="multiple">
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }} -
                                                    {{ $type->code }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="name"><b>Email</b></label>
                                        <input type="text" class="form-control form-control-alternative" name="email"
                                            id="email" aria-describedby="helpId" placeholder="" required>
                                            @if($errors->has('email'))
                                            <div class="error">{{ $errors->first('email') }}</div>
                                            @endif
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="name"><b>Account Number</b></label>
                                        <input type="text" class="form-control form-control-alternative"
                                            name="account_nb" id="tele" aria-describedby="helpId" placeholder=""
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="name"><b>Manager Telephone</b></label>
                                        <input type="text" class="form-control form-control-alternative"
                                            name="manager_tele" id="manager_tele" aria-describedby="helpId" placeholder=""
                                            required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="des"><b>Description</b></label>
                                        <textarea name="des" class="form-control form-control-alternative" cols="30" rows="3" required></textarea>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <h6 class="text-center responsive-moblile">
                                            <button id="submit-btn" type="submit" class="btn btn-primary di">
                                                Save Station
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
@section('js')
    <script>
        $(document).ready(function() {
            $('#district').select2();
            $('#type_id').select2();
        });
    </script>
@endsection
