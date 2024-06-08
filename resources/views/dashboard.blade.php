@extends('layouts.app')
@section('title', 'dashboard')
@section('content')

    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('') }}/assets/images/dashboard/circle.svg" class="card-img-absolute"
                        alt="circle-image">
                    <h1 class="mt-3">BIODATA</h1>

                    @if (Auth::user()->status_biodata == 0)
                        <a href="{{ route('biodata.index') }}" class="btn btn-gradient-info btn-sm">Lanjutkan</a>
                    @elseif(Auth::user()->status_biodata == 2)
                        <a href="{{ route('biodata.edit', auth()->user()->id) }}"
                            class="btn btn-gradient-primary btn-sm">Update Biodata</a>
                    @else
                        <a href="#" class="btn btn-gradient-warning btn-sm">Biodata Lengkap</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('') }}/assets/images/dashboard/circle.svg" class="card-img-absolute"
                        alt="circle-image">
                    <h1 class="mt-3">KARTU PELAJAR</h1>
                    @if (Auth::user()->status_biodata == 1)
                        <a href="{{ url('kartu-pelajar') }}" class="btn btn-gradient-warning btn-sm">Download</a>
                    @else
                        <a href="#" class="btn btn-gradient-danger btn-sm">Lengkapi Biodata Dulu</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">

                <div class="card-body">
                    <img src="{{ asset('') }}/assets/images/dashboard/circle.svg" class="card-img-absolute"
                        alt="circle-image">
                    <h1 class="mt-3">ABSEN SISWA</h1>
                    @if (Auth::user()->status_biodata == 1)
                        @if (!$absen)
                            <a href="{{ route('dashboard.absensi') }}" class="btn btn-gradient-warning btn-sm ">
                                Silakan Absen
                            </a>
                        @else
                            <a href="#" class="btn btn-gradient-primary btn-sm ">
                                Anda Sudah Absen
                            </a>
                        @endif
                    @else
                        <a href="#" class="btn btn-gradient-danger btn-sm">Lengkapi Biodata Dulu</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
