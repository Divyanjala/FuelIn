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
                                'https://1a45-2402-4000-20c2-17f9-2da8-c91b-693b-3e89.ap.ngrok.io/api/customerQuota/' . $user->user->id,
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
                    <div class="card shadow" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title" style="color:black">Weekly Quota</h5>

                            <h6 class="card-subtitle mt-4 text-muted">Eligible Weekly Quota :
                                {{ $user->user->quota->qty }}L</h6>
                            <h6 class="card-subtitle mt-4 text-muted">Balance Weekly Quota :
                                {{ $user->user->quota->qty - $user->user->quota->use_qty }}L</h6>
                                <br><br>
                            <form action="" method="post">
                                <div class="form-group">
                                    
                                    <input type="number" class="form-control form-control-alternative" name="qty"
                                        id="qty" aria-describedby="helpId" placeholder="Please enter qty (L)" required>
                                    <input type="hidden" class="form-control form-control-alternative"
                                        name="customer_id" id="customer_id" aria-describedby="helpId" placeholder=""
                                        value="{{ $user->user->id }}">
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-primary">Request</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>


            </div>
        </div>


        <div class="card card-body mt-2">
            {{-- <form action="" method="post">
            <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name"><b>Request Qty</b></label>
                            <input type="number" class="form-control form-control-alternative" name="qty"
                                id="qty" aria-describedby="helpId" placeholder="" required>
                            <input type="hidden" class="form-control form-control-alternative" name="customer_id"
                                id="customer_id" aria-describedby="helpId" placeholder="" value="{{ $user->user->id }}">

                        </div>
                    </div>
                    <br>
                    <div class="col-md-2 mt-4">
                        <button type="button" class="btn btn-primary">Request</button>
                    </div>


            </div>
        </form> --}}
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
