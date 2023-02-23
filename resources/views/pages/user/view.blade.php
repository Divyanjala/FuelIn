<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer</title>
    @php
        $curr_url = Route::currentRouteName();
    @endphp
    @include('includes.user.css')
</head>

<body style="background-color: #5778db">


    <div class="container mt-4" style="background-color: #5778db">

        <div class="card shadow">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h2>Customer QR Code</h2>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                            data-target="#logoutModal">Logout</button>
                    </div>
                </div>



            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col md-6">
                        <div class="mb-3">
                            {!! DNS2D::getBarcodeHTML(
                                ' https://bd82-2402-4000-b18e-918c-94f4-7f5b-e175-d02f.in.ngrok.io/api/customerQuota/' . $user->user->id,
                                'QRCODE',
                            ) !!}
                        </div>
                    </div>

                    <div class="col md-6">
                        <div class="mb-3">
                            <label for=""><b>Name</b> : {{ $user->name }}</label>
                        </div>
                        <div class="mb-3">
                            <label for=""><b>Email</b> : {{ $user->email }}</label>
                        </div>
                        <div class="mb-3">
                            <label for=""><b>Mobile Number</b> : {{ $user->user->mobile_number }}</label>
                        </div>
                        <div class="mb-3">
                            <label for=""><b>Vehical Type</b> : {{ $user->user->vehical_type }}</label>
                        </div>
                        <div class="mb-3">
                            <label for=""><b>Vehical Number</b> : {{ $user->user->vehical_number }}</label>
                        </div>
                        <div class="mb-3">
                            <label for=""><b>Customer Code</b> : {{ $user->user->code }}</label>
                        </div>
                        <div class="mb-3">
                            <label for=""><b>Fuel Type</b> : {{ $user->user->fuel->name }}</label>
                        </div>
                    </div>
                    <div class="card shadow" style="width: 22rem;">
                        <div class="card-body">
                            <h5 class="card-title" style="color:black">Weekly Quota</h5>

                            <h6 class="card-subtitle mt-4 text-muted">Eligible Weekly Quota :
                                {{ $user->user->quota->qty }}L</h6>
                            <h6 class="card-subtitle mt-4 text-muted">Balance Weekly Quota :
                                {{ $user->user->quota->qty - $user->user->quota->use_qty }}L</h6>
                                <br><br>
                            <form action="{{ route('user.request.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="station_id"><b>Station</b></label>
                                    <select class="form-control" id="station_id" name="station_id">
                                        @foreach ($stations as $station)
                                            <option value="{{ $station->id }}">{{ $station->name }} -
                                                {{ $station->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">

                                    <input type="number" class="form-control form-control-alternative" name="qty"
                                        id="qty" aria-describedby="helpId" placeholder="Please enter qty (L)" required>
                                    <input type="hidden" class="form-control form-control-alternative"
                                        name="customer_id" id="customer_id" aria-describedby="helpId" placeholder=""
                                        value="{{ $user->user->id }}">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Request</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>


            </div>
        </div>


        <div class="card card-body mt-2">
            <table class="table table-sm table-dark">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Station</th>
                    <th scope="col">Request Qty (L)</th>
                    <th scope="col">Date</th>
                    <th scope="col">Token Number</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $key=>$request)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <th scope="row">{{$request->station->name}}</th>
                        <td>{{$request->qty}}</td>
                        <td>{{$request->date}}</td>
                        <td>{{$request->quota_index}}</td>
                      </tr>
                    @endforeach

                </tbody>
              </table>
        </div>
    </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    {{-- <a class="btn btn-primary" href="login.html">Logout</a> --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('includes.user.js')
</body>

</html>
