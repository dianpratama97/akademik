@extends('layouts.app')
@section('title', 'ABSEN SISWA SEKOLAH')
@section('content')


    <div class="card">
        <div class="card-body">

            <button type="button" class="btn btn-block btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#hadir">
                HADIR
            </button>

            <button type="button" class="btn btn-block btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#izin">
                IZIN
            </button>
            <button type="button" class="btn btn-block btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#sakit">
                SAKIT
            </button>
        </div>
    </div>

    <!-- hadir -->
    @include('master_absensi.absen_siswa.modal-siswa.hadir')
    <!-- izin -->
    @include('master_absensi.absen_siswa.modal-siswa.izin')
    {{-- sakit --}}
    @include('master_absensi.absen_siswa.modal-siswa.sakit')
@endsection


@push('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"
        integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    
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
            var keterangan = $("#desc").val();

      
            $.ajax({
                url: "{{ route('absensi.store_absen') }}",
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
