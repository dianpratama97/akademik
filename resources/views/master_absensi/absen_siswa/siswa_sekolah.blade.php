@extends('layouts.app')
@section('title', 'ABSEN SISWA')
@section('content')


    <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-block btn-sm btn-info" data-toggle="modal" data-target="#hadir">
                HADIR
            </button>

            <button type="button" class="btn btn-block btn-sm btn-secondary" data-toggle="modal" data-target="#izin">
                IZIN
            </button>
            <button type="button" class="btn btn-block btn-sm btn-warning" data-toggle="modal" data-target="#sakit">
                SAKIT
            </button>
        </div>
    </div>

    <!-- hadir -->
    <div class="modal fade" id="hadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">HADIR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('absensi.store') }}" method="post">
                    @csrf
                    <input type="hidden" id="lokasi" name="lokasi">
                    <input type="hidden" name="status" value="hadir">
                    <div class="modal-body text-center">
                        <h1>Selamat Pagi, {{ Auth::user()->name }}</h1>
                        <h3>Jam {{ date('h:m') }}, {{ date('d-m-yy') }}. </h3>
                        <h3>Terimakasih Sudah Absen. </h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-success" id="store">KIRIM</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- izin -->
    <div class="modal fade" id="izin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">IZIN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('absensi.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="status" value="izin">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="keterangan">JELASKAN IZIN ANDA</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-success">KIRIM</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- sakit --}}
    <div class="modal fade" id="sakit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SAKIT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- <form action="{{ route('absensi.store') }}" method="post">
                    @csrf --}}
                <input type="hidden" name="status" id="status" value="sakit">
                <div class="modal-body">
                    <div class="webcam-absen"></div>
                    <ul class="m-2 text-danger">
                        <li>Hanya orang tua/wali siswa yang boleh foto.</li>
                        <li>Hanya boleh fotokan surat sakit dari dokter/puskesmas.</li>
                    </ul>
                    <div class="form-group">
                        <label for="keterangan">JELASKAN SAKIT ANDA</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">BATAL</button>
                    <button id="take-absen" class="btn btn-success">KIRIM</button>
                </div>
                {{-- </form> --}}

            </div>
        </div>
    </div>
@endsection


@push('css')
    <link rel="stylesheet" href="http://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"
        integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@push('js-internal')
    <script>
        Webcam.set({
            width: 300,
            height: 200,
            image_format: 'jpeg',
            jpeg_quality: 50

        });
        Webcam.attach('.webcam-absen');

        $("#take-absen").click(function(e) {

            Webcam.snap(function(uri) {
                image = uri;
            });

            var lokasi = $("#lokasi").val();
            var status = $("#status").val();
            var keterangan = $("#keterangan").val();
            $.ajax({

                url: "{{ route('absensi.store') }}",

                type: 'POST',

                data: {

                    _token: "{{ csrf_token() }}",
                    image: image,
                    lokasi: lokasi,
                    status: status,
                    keterangan: keterangan

                },

                cache: false,

                success: function(res) {

                    if (res == 1) {

                        Swal.fire({

                            icon: 'success',

                            title: 'ABSEN BERHASIL',

                        });

                        setTimeout("location.href='/dashboard'", 2000);

                    } else {

                        Swal.fire({

                            icon: 'error',

                            title: 'ABSEN GAGAL',

                            text: 'Hubungi Admin'

                        });

                        setTimeout("location.href='/dashboard'", 2000);

                    }

                }

            });

        });


        var gps = document.getElementById("lokasi");
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            gps.innerHTML = "Browser anda tidak support.";
        }

        function showPosition(position) {
            gps.value = position.coords.latitude + ", " + position.coords.longitude;
        }
    </script>
@endpush
