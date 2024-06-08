@extends('layouts.app')
@section('title', 'halaman pengaturan')
@section('content')

    <div class="card">
        <div class="card-header">
            @if ($config != null)
                <a href="{{ route('config.edit', $config->id) }}" class="btn btn-primary">Edit Data</a>
            @else
                <a href="{{ route('config.create') }}" class="btn btn-primary">Buat Data</a>
            @endif
        </div>
        <div class="card-body">
            <table class="table table-bordered table-responsive">
                <tr>
                    <td width="10%">Nama Kepala Sekolah</td>
                    <td width="2%">:</td>
                    <td>{{  $config == null ?  '' : $config->nama_kepsek  }}</td>
                </tr>
                <tr>
                    <td>NIP Kepala Sekolah</td>
                    <td>:</td>
                    <td>{{  $config == null ?  '' : $config->nip_kepsek  }}</td>
                </tr>
                <tr>
                    <td>TTD Kepala Sekolah</td>
                    <td>:</td>
                    <td>
                        <img src="{{  $config == null ?  '' : asset('storage/gambar/configs/' . $config->ttd)  }}">
                    </td>
                </tr>
                <tr>
                    <td>Logo Sekolah</td>
                    <td>:</td>
                    <td>
                        <img src="{{  $config == null ?  '' : asset('storage/gambar/configs/' . $config->logo)  }}">
                    </td>
                </tr>
                <tr>
                    <td>Cap Sekolah</td>
                    <td>:</td>
                    <td>
                        <img src="{{  $config == null ?  '' : asset('storage/gambar/configs/' . $config->cap)  }}">
                    </td>
                </tr>
                <tr>
                    <td>Nama Web Sekolah</td>
                    <td>:</td>
                    <td>{{  $config == null ?  '' : $config->nama_web  }}</td>
                </tr>
                <tr>
                    <td>Jam Kelulusan Kelas 12</td>
                    <td>:</td>
                    <td>{{  $config == null ?  '' : $config->jam  }}</td>
                </tr>
                <tr>
                    <td>Visi Sekolah</td>
                    <td>:</td>
                    <td>{!! $config == null ?  '' :  $config->visi   !!}</td>
                </tr>
                <tr>
                    <td>Misi Sekolah</td>
                    <td>:</td>
                    <td>{!! $config == null ?  '' :  $config->misi   !!}</td>
                </tr>
            </table>
        </div>
    </div>

@endsection
