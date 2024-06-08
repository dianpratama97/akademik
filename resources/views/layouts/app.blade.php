<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Purple Admin</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('') }}/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('') }}/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('') }}/assets/images/favicon.ico" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"
        integrity="sha512-3P8rXCuGJdNZOnUx/03c1jOTnMn3rP63nBip5gOP2qmUh5YAdVAvFZ1E+QLZZbC1rtMrQb+mah3AfYW11RUrWA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- css -->
    @stack('css')
    <!-- End css -->
</head>

<body>
    <div class="container-scroller">

        <!-- navbar -->
        @include('components.nav')
        <!-- end-navbar -->

        <div class="container-fluid page-body-wrapper">

            <!-- sidebar -->
            @include('components.sidebar')
            <!-- end-sidebar -->

            {{-- content --}}
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="alert alert-primary text-capitalize">@yield('title')</div>
                    @yield('content')
                </div>
                <!-- footer -->
                @include('components.footer')
                <!-- footer -->
            </div>
            <!-- end-content -->

        </div>

    </div>

    <!-- plugins:js -->
    <script src="{{ asset('') }}/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->

    <!-- inject:js -->
    <script src="{{ asset('') }}/assets/js/off-canvas.js"></script>
    <script src="{{ asset('') }}/assets/js/hoverable-collapse.js"></script>
    <script src="{{ asset('') }}/assets/js/misc.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- endinject -->

    <!-- js-page -->
    @stack('js')
    <!-- End js-page -->

    <!-- javascript -->
    @stack('javascript')
    <!-- End javascript -->
    @include('sweetalert::alert')

    {{-- auto logout --}}
    <script>
        // autologout.js

        $(document).ready(function() {
            const timeout = 43200000; // 900000 ms = 15 minutes //12 jam
            var idleTimer = null;
            $('*').bind(
                'mousemove click mouseup mousedown keydown keypress keyup submit change mouseenter scroll resize dblclick',
                function() {
                    clearTimeout(idleTimer);

                    idleTimer = setTimeout(function() {
                        document.getElementById('auto-logout').submit();
                    }, timeout);
                });
            $("body").trigger("mousemove");
        });
    </script>
</body>

</html>
