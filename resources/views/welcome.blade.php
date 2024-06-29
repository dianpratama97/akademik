@extends('layouts.home')
@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="col-xl-12 col-md-12" style="margin-top: -100px">
            <div class="card card-congratulation-medal" style="height: 70px">
                <div class="card-body text-center">
                    <h1>SILAKAN PILIH MENU DI BAWAH</h1>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="card card-congratulation-medal" style="height: 170px">
                        <div class="card-body">
                            <h5>Kelulusan</h5>
                            <p class="card-text font-small-3">Silakan Cek Kelulusan Anda Disini</p>
                            <a href="{{ route('kelulusan.halaman_cek') }}"
                                class="btn btn-primary waves-effect waves-float waves-light">Klik Saya</a>

                            <img src="{{ asset('') }}/app-assets/images/illustration/badge.svg"
                                class="congratulation-medal" alt="Medal Pic">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="card card-congratulation-medal" style="height: 170px">
                        <div class="card-body">
                            <h5>Login Akademik</h5>
                            <p class="card-text font-small-3">Silakan Login Akademik</p>

                            <a href="{{ route('login') }}" class="btn btn-primary waves-effect waves-float waves-light">Klik
                                Saya</a>
                            <img src="{{ asset('') }}/app-assets/images/illustration/badge.svg"
                                class="congratulation-medal" alt="Medal Pic">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
