<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Akademik</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('') }}/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('') }}/assets/css/style.css">
    <!-- End layout styles -->
</head>

<body style="background-color: #f2edf3; ">

    <div class="container mt-5 text-center">
        <img src="{{ asset('assets/images/logo.png') }}" width="10%">
        <div class="card text-center mt-5">
            <div class="card-body">
                <div class="row">
                    <div class="col stretch-card grid-margin">
                        <div class="card bg-gradient-danger card-img-holder ">
                            <a href="{{ route('kelulusan.halaman_cek') }}" style="text-decoration: none;">
                                <div class="card-body text-white">
                                    <img src="{{ asset('/assets/images/dashboard/circle.svg') }}"
                                        class="card-img-absolute" alt="circle-image">
                                    <h1 class="mt-3">CEK KELULUSAN</h1>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col stretch-card grid-margin">
                        <div class="card bg-gradient-success card-img-holder ">
                            <a href="{{ route('login') }}" style="text-decoration: none;">
                                <div class="card-body text-white">
                                    <img src="{{ asset('/assets/images/dashboard/circle.svg') }}"
                                        class="card-img-absolute" alt="circle-image">
                                    <h1 class="mt-3">LOGIN</h1>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer text-body-secondary">
                SISTEM INFORMASI AKADEMIK SEKOLAH
            </div>
        </div>
    </div>

</body>

</html>
