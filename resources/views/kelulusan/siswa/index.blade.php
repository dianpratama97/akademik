@extends('layouts.home')
@section('content')
    <div class=" text-center" style="margin-top: -60px">
        <img src="{{ asset('assets/images/logo.png') }}" width="10%">
        <div class="card text-center mt-4">
            <div class="card-footer text-body-secondary">
                <h2>CEK KELULUSAN SISWA KELAS 12</h2>
            </div>
            <div class="card-body">
                @if (!$config)
                    <h1>Ops...</h1>
                    <a href="{{ route('welcome') }}"
                        class="btn btn-block btn-gradient-warning btn-lg font-weight-medium auth-form-btn">HOME</a>
                @else
                    @if (!$config->jam)
                        <h1>WAKTU KELULUSAN BELUM DITENTUKAN</h1>
                        <a href="{{ route('welcome') }}"
                            class="btn btn-block btn-gradient-warning btn-lg font-weight-medium auth-form-btn">HOME</a>
                    @else
                        @if ($config->jam <= date('H:i'))
                            <form action="{{ route('kelulusan.cek') }}" method="post">
                                @csrf
                                <input type="number" class="form-control" name="nisn_user"
                                    placeholder="Masukan Nomor Induk Siswa Nasional/NISN Anda" required>

                                <button type="submit" class="btn btn-success mt-3">CEK KELULUSAN</button>

                            </form>
                        @else
                            <h1 class="mt-1">Pengumuman Kelulusan Pukul</h1>
                            <h1 class="mt-2">{{ $config->jam }} WIB</h1>
                            <h2 id="jam">sd</h2>
                        @endif
                    @endif
                @endif

            </div>
            <div class="card-footer text-body-secondary">
                SISTEM INFORMASI AKADEMIK SEKOLAH
            </div>
        </div>
    </div>
@endsection
