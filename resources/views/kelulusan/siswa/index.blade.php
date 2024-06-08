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

    <script type="text/javascript">
        window.onload = function() {
            jam();
        }

        function jam() {
            var e = document.getElementById('jam'),
                d = new Date(),
                h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());

            e.innerHTML = h + ':' + m + ':' + s;

            setTimeout('jam()', 1000);
        }

        function set(e) {
            e = e < 10 ? '0' + e : e;
            return e;
        }
    </script>



</head>

<body style="background-color: #f2edf3; ">

    <div class="container mt-5 text-center">
        <img src="{{ asset('assets/images/logo.png') }}" width="10%">
        <div class="card text-center mt-5">
            <div class="card-body">
                @if ($config->jam <= date('H:i'))
                    <div class="col stretch-card grid-margin">
                        <div class="card bg-gradient-success card-img-holder ">
                            <a href="{{ url('/') }}" style="text-decoration: none;">
                                <div class="card-body text-white">
                                    <img src="{{ asset('/assets/images/dashboard/circle.svg') }}"
                                        class="card-img-absolute" alt="circle-image">
                                    <h1 class="mt-3">Halaman Kelulusan Kelas 12</h1>
                                </div>
                            </a>
                        </div>
                    </div>
                    <form action="{{ route('kelulusan.cek') }}" method="post">
                        @csrf
                        <input type="number" class="form-control" name="nisn_user"
                            placeholder="Masukan Nomor Induk Siswa Nasional/NISN Anda" required>

                        <button type="submit" class="btn btn-success mt-3">CEK KELULUSAN</button>

                    </form>
                @else
                    <div class="col stretch-card grid-margin">
                        <div class="card bg-gradient-primary card-img-holder ">
                            <a href="{{ url('/') }}" style="text-decoration: none;">
                                <div class="card-body text-white">
                                    <img src="{{ asset('/assets/images/dashboard/circle.svg') }}"
                                        class="card-img-absolute" alt="circle-image">
                                    <h1 class="mt-3">Pengumuman Kelulusan Jam</h1>
                                    <h1 class="mt-3">{{ $config->jam }} WIB</h1>
                                    <h2 id="jam">sd</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
            <div class="card-footer text-body-secondary">
                SISTEM INFORMASI AKADEMIK SEKOLAH
            </div>
        </div>
    </div>

</body>

</html>
