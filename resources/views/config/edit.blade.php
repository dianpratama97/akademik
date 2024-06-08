@extends('layouts.app')
@section('title', 'buat pengaturan')
@section('content')

    <div class="card">
        <form action="{{ route('config.update', $config->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="old_ttd" value="{{ $config->ttd }}">
            <input type="hidden" name="old_cap" value="{{ $config->cap }}">
            <input type="hidden" name="old_logo" value="{{ $config->logo }}">
            <div class="card-header">
                <a href="{{ route('config.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_kepsek" class="form-label">Nama Kepala Sekolah</label>
                            <input type="text" class="form-control @error('nama_kepsek') is-invalid @enderror"
                                id="nama_kepsek" name="nama_kepsek" value="{{ $config->nama_kepsek }}">
                            @error('nama_kepsek')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jam" class="form-label">Jam Kelulusan</label>
                            <input type="time" class="form-control @error('jam') is-invalid @enderror" id="jam"
                                name="jam" value="{{ $config->jam }}">
                            @error('jam')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nip_kepsek" class="form-label">NIP Kepala Sekolah</label>
                            <input type="text" class="form-control @error('nip_kepsek') is-invalid @enderror"
                                id="nip_kepsek" name="nip_kepsek" value="{{ $config->nip_kepsek }}">
                            @error('nip_kepsek')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama_web" class="form-label">Nama Web Sekolah</label>
                            <input type="text" class="form-control @error('nama_web') is-invalid @enderror"
                                id="nama_web" name="nama_web" value="{{ $config->nama_web }}">
                            @error('nama_web')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label for="ttd" class="form-label">Tanda Tangan Kepala Sekolah</label>
                                <input class="form-control @error('ttd') is-invalid @enderror" type="file" name="ttd"
                                    value="{{ old('ttd') }}" id="ttd" onchange="ttdKepsek()">
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('storage/gambar/configs/' . $config->ttd) }}" width="70%"
                                    id="viewTtd">
                            </div>
                            @error('ttd')
                                <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label for="cap" class="form-label">Cap Sekolah</label>
                                <input class="form-control @error('cap') is-invalid @enderror" type="file" name="cap"
                                    value="{{ old('cap') }}" id="cap" onchange="capSekolah()">
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('storage/gambar/configs/' . $config->cap) }}" width="70%"
                                    id="viewCap">
                            </div>
                            @error('cap')
                                <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label for="logo" class="form-label">Logo Sekolah</label>
                                <input class="form-control @error('logo') is-invalid @enderror" type="file"
                                    name="logo" value="{{ old('logo') }}" id="logo" onchange="logoSekolah()">
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('storage/gambar/configs/' . $config->logo) }}" width="70%"
                                    id="viewLogo">
                            </div>
                            @error('logo')
                                <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="visi" class="form-label">Visi Sekolah</label>
                        <textarea class=" @error('visi') is-invalid @enderror" name="visi" id="editorVisi">{{ $config->visi }}</textarea>
                        @error('visi')
                            <span class='text-danger'>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="misi" class="form-label">Misi Sekolah</label>
                        <textarea class=" @error('misi') is-invalid @enderror" name="misi" id="editorMisi">{{ $config->misi }}</textarea>
                        @error('misi')
                            <span class='text-danger'>{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>

@endsection
@push('js')
    <script src="{{ asset('assets') }}/ckeditor/ckeditor.js"></script>
@endpush
@push('javascript')
    <script>
        //image preview
        function ttdKepsek() {
            viewTtd.src = URL.createObjectURL(event.target.files[0]);
        }

        function capSekolah() {
            viewCap.src = URL.createObjectURL(event.target.files[0]);
        }

        function logoSekolah() {
            viewLogo.src = URL.createObjectURL(event.target.files[0]);
        }

        CKEDITOR.replace('editorVisi');
        CKEDITOR.replace('editorMisi');
    </script>
@endpush
