<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FuelIn- Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('theme/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('theme/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="{{ asset('theme/vendor/jquery/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="{{ asset('theme/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('theme/js/js/notify/index.js') }}"></script>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mt-4">Create an Account!</h1>
                </div>
                <!-- Nested Row within Card Body -->
                <form class="user" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 pl-5">
                            <x-auth-validation-errors style="color: red;" class="mb-4" :errors="$errors" />
                        </div>

                        <div class="col-lg-6">

                            <div class="pt-5 pl-5 pb-5">

                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="full_name"
                                            placeholder="Full Name" name="name">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email" class="form-control form-control-user"
                                            id="exampleInputEmail" placeholder="Email Address" name="email">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user"
                                            id="exampleLastName" placeholder="Mobile Phone Number" name="mobile">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="address"
                                        placeholder="Address" name="address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password"
                                            name="password_confirmation">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 pt-5 pr-5 pb-5">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="tele" class="form-control form-control-user" id="mobile_number"
                                        placeholder="Telephone" name="mobile_number">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="nic"
                                        placeholder="NIC" name="nic">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="tele" class="form-control form-control-user"
                                        id="registration_number" placeholder="Registration Number"
                                        name="registration_number">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="engine_number"
                                        placeholder="Engine Number" name="engine_number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select name="vehical_type" class="form-control" placeholder="NIC">
                                        <option value="">- Select Vehicle Type -</option>
                                        @foreach ($vehicleTypesArr as $vehicleType)
                                            <option value="{{ $vehicleType['id'] }}">{{ $vehicleType['name'] }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-sm-6">
                                    <select name="fuel_type_id" class="form-control">
                                        <option value="">- Select Fuel Type -</option>
                                        @foreach ($fuelTypesArr as $fuelType)
                                            <option value="{{ $fuelType['id'] }}">{{ $fuelType['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="tele" class="form-control form-control-user" id="chassis_number"
                                        placeholder="Chassis Number" name="chassis_number">
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="tele" class="form-control form-control-user" id="vehical_number"
                                        placeholder="Vehical Number" name="vehical_number">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>

                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>

    <script type='text/javascript'>
        $(document).ready(function() {

            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if (Session::has('alert-' . $msg))
                    var msg = '@php echo Session("alert-".$msg); @endphp';
                    @if ($msg == 'success')
                        setTimeout(() => {
                            alertSuccess(msg);
                        }, 500);
                    @endif
                    @if ($msg == 'danger')
                        setTimeout(() => {
                            alertDanger(msg);
                        }, 500);
                    @endif
                    @if ($msg == 'info')
                        setTimeout(() => {
                            alertInfo(msg);
                        }, 500);
                    @endif
                    @if ($msg == 'warning')
                        setTimeout(() => {
                            alertWarning(msg);
                        }, 500);
                    @endif
                @endif
            @endforeach



            function alertSuccess(msg) {

                var title = '<strong><i class="icon-bell"></i> Success</strong>';
                $.notify({
                    title: title,
                    message: msg
                }, {
                    type: 'success',
                    allow_dismiss: true,
                    delay: 5000,
                    showProgressbar: true,
                    timer: 100,
                    spacing: 10,
                    placement: {
                        from: 'bottom',
                        align: 'right'
                    },
                    offset: {
                        x: 30,
                        y: 30
                    },
                    animate: {
                        enter: 'animated fadeInUp',
                        exit: 'animated fadeOutDown'
                    }
                });
            }

            function alertDanger(msg) {

                var title = '<strong><i class="icon-bell"></i> Oops</strong>' + msg;
                $.notify({
                    title: title,
                    message: msg
                }, {
                    type: 'danger',
                    allow_dismiss: true,
                    delay: 5000,
                    showProgressbar: true,
                    timer: 100,
                    spacing: 10,
                    placement: {
                        from: 'bottom',
                        align: 'right'
                    },
                    offset: {
                        x: 30,
                        y: 30
                    },
                    animate: {
                        enter: 'animated fadeInUp',
                        exit: 'animated fadeOutDown'
                    }
                });
            }

            function alertWarning(msg) {

                var title = '<strong><i class="icon-bell"></i> Warning</strong>';
                $.notify({
                    title: title,
                    message: msg
                }, {
                    type: 'warning',
                    allow_dismiss: true,
                    delay: 5000,
                    showProgressbar: true,
                    timer: 100,
                    spacing: 10,
                    placement: {
                        from: 'bottom',
                        align: 'right'
                    },
                    offset: {
                        x: 30,
                        y: 30
                    },
                    animate: {
                        enter: 'animated fadeInUp',
                        exit: 'animated fadeOutDown'
                    }
                });
            }

            function alertInfo(msg) {

                var title = '<strong><i class="icon-bell"></i> Attention</strong>';
                $.notify({
                    title: title,
                    message: msg
                }, {
                    type: 'info',
                    allow_dismiss: true,
                    delay: 5000,
                    showProgressbar: true,
                    timer: 100,
                    spacing: 10,
                    placement: {
                        from: 'bottom',
                        align: 'right'
                    },
                    offset: {
                        x: 30,
                        y: 30
                    },
                    animate: {
                        enter: 'animated fadeInUp',
                        exit: 'animated fadeOutDown'
                    }
                });
            }

            function delconf(url, title = "Do You Want To Remove This!") {
                $.confirm({
                    title: 'Are You Sure,',
                    content: title,
                    autoClose: 'cancel|8000',
                    type: 'red',
                    confirmButton: "Yes",
                    cancelButton: "Cancel",
                    theme: 'material',
                    backgroundDismiss: false,
                    backgroundDismissAnimation: 'glow',
                    buttons: {
                        tryAgain: {
                            text: "Yes, Delete It ",
                            action: function() {
                                $.ajax({
                                    url: url,
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                            'content')
                                    },
                                    type: 'GET',
                                    success: function() {
                                        location.reload();
                                    }
                                });
                            }
                        },
                        cancel: function() {}
                    }
                });
            }

            function approve(url, title = "Do You Want To Approve It") {
                $.confirm({
                    title: 'Are you sure,',
                    content: title,
                    autoClose: 'cancel|8000',
                    type: 'green',
                    theme: 'material',
                    backgroundDismiss: false,
                    backgroundDismissAnimation: 'glow',
                    buttons: {
                        'Yes, Publish IT': function() {
                            window.location.href = url;
                            confirmButton: "Yes";
                            cancelButton: "Cancel";
                        },
                        cancel: function() {

                        },

                    }
                });
            }

            function decline(url, title = "Do You Want To Decline It") {
                $.confirm({
                    title: 'Are you sure,',
                    content: title,
                    autoClose: 'cancel|8000',
                    type: 'red',
                    theme: 'material',
                    backgroundDismiss: false,
                    backgroundDismissAnimation: 'glow',
                    buttons: {
                        'Yes, Unpublish IT': function() {
                            window.location.href = url;
                        },
                        cancel: function() {

                        },

                    }
                });
            }

        });
    </script>
</body>

</html>
