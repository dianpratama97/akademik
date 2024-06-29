@extends('layouts.app')
@section('title', 'dashboard')
@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th>MENU</th>
                    <th>STATUS</th>
                </thead>
                <tbody>
                    <tr>
                        <td>BIODATA</td>
                        <td>
                            @if (Auth::user()->status_biodata == 0)
                                <a href="{{ route('biodata.index') }}" class="btn btn-gradient-info btn-sm">Lanjutkan</a>
                            @elseif(Auth::user()->status_biodata == 2)
                                <a href="{{ route('biodata.edit', auth()->user()->id) }}"
                                    class="btn btn-gradient-primary btn-sm">Update Biodata</a>
                            @else
                                <a href="#" class="btn btn-gradient-warning btn-sm">Biodata Lengkap</a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>KARTU PELAJAR</td>
                        <td>
                            @if (Auth::user()->status_biodata == 1)
                                <a href="{{ url('kartu-pelajar') }}" class="btn btn-gradient-success btn-sm">Download</a>
                            @else
                                <a href="#" class="btn btn-gradient-danger btn-sm">Lengkapi Biodata Dulu</a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>ABSEN</td>
                        <td>
                            @if (Auth::user()->status_biodata == 1)
                                @if (!$absen)
                                    <a href="{{ route('dashboard.absensi') }}" class="btn btn-gradient-info btn-sm ">
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
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
