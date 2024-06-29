@extends('layouts.app')

@section('title', 'HALAMAN ABSEN SISWA PKL')

@section('content')

    <input type="hidden" id="lokasi">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="webcam-absen mt-3" style="width: 100%"></div>

                    <div class="row justify-content-center mt-3">
                        <button id="take-absen" class="m-2 btn btn-sm btn-primary">
                            ABSEN
                        </button>

                        <button type="button" class="m-2 btn btn-sm btn-secondary" data-bs-toggle="modal"
                            data-bs-target="#izin">
                            IZIN
                        </button>

                        <button type="button" class="m-2 btn btn-sm btn-warning" data-bs-toggle="modal"
                            data-bs-target="#sakit">
                            SAKIT
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="map" class="map mt-3"></div>
                </div>
            </div>


        </div>
    </div>


    <!-- izin -->
    <div class="modal fade" id="izin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">IZIN</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">BATAL</button>
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
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>



                <input type="hidden" name="status" id="status" value="sakit">
                <div class="modal-body">
                    <div class="webcam-sakit"></div>
                    <ul class="m-2 text-danger">
                        <li>Hanya orang tua/wali siswa yang boleh foto.</li>
                        <li>Hanya boleh fotokan surat sakit dari dokter/puskesmas.</li>
                    </ul>
                    <div class="form-group">
                        <label for="keterangan">JELASKAN SAKIT ANDA</label>
                        <textarea class="form-control" id="keterangan-sakit" name="keterangan" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">BATAL</button>
                    <button id="take-sakit" class="btn btn-success">KIRIM</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>
        #map {
            height: 400px;
        }
    </style>
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"
        integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>


@endpush



@push('js-internal')
    {{-- absen sakit --}}
    <script>
        Webcam.set({
            width: 300,
            height: 200,
            image_format: 'jpeg',
            jpeg_quality: 50

        });
        Webcam.attach('.webcam-sakit');

        $("#take-sakit").click(function(e) {

            Webcam.snap(function(uri) {
                image = uri;
            });


            var keterangan = $("#keterangan-sakit").val();
            var status = $("#status").val();
            $.ajax({
                url: "{{ route('absensi.store') }}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    image: image,
                    keterangan: keterangan,
                    status: status,
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
    </script>

    {{-- absen hadir --}}
    <script>
        Webcam.set({
            height: 200,
            image_format: 'jpeg',
            jpeg_quality: 50

        });
        Webcam.attach('.webcam-absen');

        $(document).ready(function() {
            var lokasi = document.getElementById('lokasi')
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
            }

            function successCallback(position) {
                lokasi.value = position.coords.latitude + "," + position.coords.longitude;
                var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 15);
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);
                var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
            }

            function errorCallback() {}
        });

        $("#take-absen").click(function(e) {
            Webcam.snap(function(uri) {
                image = uri;
            });
            var lokasi = $("#lokasi").val();

            $.ajax({
                url: "{{ route('absensi.store') }}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    image: image,
                    lokasi: lokasi
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
    </script>
@endpush
