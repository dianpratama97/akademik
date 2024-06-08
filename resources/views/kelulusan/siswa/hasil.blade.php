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

<body style="background-color: #b9b7ba; ">

    <div class="container mt-5 text-center">
        <img src="{{ asset('assets/images/logo.png') }}" width="10%">
        <div class="card text-center mt-5">
            <div class="card-body">

                <div class="row">

                    @if ($data)
                        <div class="col stretch-card grid-margin mt-3">
                            <div class="card bg-gradient-success card-img-holder ">
                                <a href="{{ route('kelulusan.halaman_cek') }}" style="text-decoration: none;">
                                    <div class="card-body text-white">
                                        <img src="{{ asset('/assets/images/dashboard/circle.svg') }}"
                                            class="card-img-absolute" alt="circle-image">

                                        <table class="table table-bordered" style="text-align: left;">
                                            <thead>
                                                <tr>
                                                    <th width="30%">Nama Siswa</th>
                                                    <th width="3%">:</th>
                                                    <th width="77%">{{ $data->name }}</th>
                                                </tr>
                                                <tr>
                                                    <th>NISN</th>
                                                    <th>:</th>
                                                    <th>{{ $data->nisn }}</th>
                                                </tr>
                                                <tr>
                                                    <th>KELAS</th>
                                                    <th>:</th>
                                                    <th>{{ $data->kelas }}</th>
                                                </tr>
                                                <tr>
                                                    <th>JURUSAN</th>
                                                    <th>:</th>
                                                    <th>{{ $data->jurusan }}</th>
                                                </tr>
                                            </thead>

                                        </table>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @if ($data->status_lulus == 1)
                            <div class="col stretch-card grid-margin mt-3">
                                <div class="card bg-gradient-success card-img-holder ">
                                    <a href="{{ route('kelulusan.halaman_cek') }}" style="text-decoration: none;">
                                        <div class="card-body text-white">
                                            <img src="{{ asset('/assets/images/dashboard/circle.svg') }}"
                                                class="card-img-absolute" alt="circle-image">
                                            <h1 class="mt-5"><b>SELAMAT ANDA DINYATAKAN LULUS</b></h1>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col stretch-card grid-margin mt-3">
                                <div class="card bg-gradient-danger card-img-holder ">
                                    <a href="{{ route('kelulusan.halaman_cek') }}" style="text-decoration: none;">
                                        <div class="card-body text-white">
                                            <img src="{{ asset('/assets/images/dashboard/circle.svg') }}"
                                                class="card-img-absolute" alt="circle-image">
                                            <h1 class="mt-5">MAAF ANDA TIDAK LULUS</h1>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="col stretch-card grid-margin">
                            <div class="card bg-gradient-danger card-img-holder ">
                                <a href="{{ route('kelulusan.halaman_cek') }}" style="text-decoration: none;">
                                    <div class="card-body text-white">
                                        <img src="{{ asset('/assets/images/dashboard/circle.svg') }}"
                                            class="card-img-absolute" alt="circle-image">
                                        <h1 class="mt-3">NISN ANDA TIDAK DITEMUKAN</h1>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif


                </div>
            </div>
            <div class="card-footer text-body-secondary">
                SISTEM INFORMASI AKADEMIK SEKOLAH
            </div>
        </div>
    </div>

</body>

</html>
