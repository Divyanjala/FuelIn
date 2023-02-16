    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('theme/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('theme/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('theme/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('theme/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('theme/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('theme/js/demo/chart-pie-demo.js') }}"></script>

    <script src="{{ asset('theme/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('theme/js/js/notify/index.js') }}"></script>
    <!-- Datatables JS -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
       <!-- Select2 JS -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

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
    @yield('js')
