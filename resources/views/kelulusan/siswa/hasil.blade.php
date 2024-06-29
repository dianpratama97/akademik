@extends('layouts.home')
@section('content')
    <div class="text-center" style="margin-top: -120px">
        <img src="{{ asset('assets/images/logo.png') }}" width="10%">
        <div class="card text-center mt-5">
            <div class="card-body">

                <div class="row">

                    @if ($data)
                        <div class="d-flex justify-content-center">
                            <div class="card col-xl-6 col-md-12 ">
                                <table class="table table-bordered" style="text-align: left;">
                                    <thead>
                                        <tr>
                                            <th width="40%">Nama Siswa</th>
                                            <th width="3%">:</th>
                                            <th width="66%">{{ $data->name }}</th>
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
                        </div>
                        @if ($data->status_lulus == 1)
                            <h1 class="mt-3 bg-info text-white"><b>SELAMAT ANDA DINYATAKAN LULUS</b></h1>
                        @else
                            <h1 class="mt-3 bg-danger text-white">MAAF ANDA TIDAK LULUS</h1>
                        @endif
                    @else
                        <h1 class="mt-3">NISN ANDA SALAH. SILAKAN MASUKAN NISN YANG BENAR.</h1>
                    @endif


                </div>
            </div>
            <div class="card-footer text-body-secondary">
                SISTEM INFORMASI AKADEMIK SEKOLAH <br>
                <a href="{{ route('welcome') }}" class="btn btn-gradient-warning  font-weight-medium auth-form-btn">HOME</a>
            </div>
        </div>
    </div>
@endsection
