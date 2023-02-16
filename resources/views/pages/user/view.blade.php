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
<body>


    <div class="container mt-4">

        <div class="card">
            <div class="card-header">
                <h2>Customer QR Code</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col md-6">
                        <div class="mb-3">
                            {!! DNS2D::getBarcodeHTML("https://techvblogs.com/blog/generate-qr-code-laravel-9",
                             'QRCODE') !!}
                        </div>
                    </div>
                    <div class="col md-6">
                        <div class="mb-3">
                            <label for=""><b>Name</b> :  {{$user->name}}</label>
                        </div>
                        <div class="mb-3">
                            <label for=""><b>Email</b> : {{$user->email}}</label>
                        </div>
                        <div class="mb-3">
                            <label for=""><b>Mobile Number</b> : {{$user->user->mobile_number}}</label>
                        </div>
                        <div class="mb-3">
                            <label for=""><b>Vehical Type</b> : {{$user->user->vehical_type}}</label>
                        </div>
                        <div class="mb-3">
                            <label for=""><b>Vehical Number</b> : {{$user->user->vehical_number}}</label>
                        </div>
                        <div class="mb-3">
                            <label for=""><b>Customer Code</b> : {{$user->user->code}}</label>
                        </div>
                        <div class="mb-3">
                            <label for=""><b>Fuel Type</b> : {{$user->user->fuel->name}}</label>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

    @include('includes.user.js')
</body>
</html>

