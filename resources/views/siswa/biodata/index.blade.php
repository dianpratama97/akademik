@extends('layouts.app')
@section('title', 'Biodata Siswa')
@section('content')

    <div class="card">
        <div class="card-header">
            <ul>
                <li>Silakan lengkapi biodata anda.</li>
                <li>Silakan memasukan data yang benar.</li>
                <li>Biodata tidak bisa di edit lagi.</li>
                <li>Biodata menjadi data untuk kartu pelajar.</li>
            </ul>
        </div>
        <form action="{{ route('biodata.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="card-body">
                <div class="row">
                    {{-- col 1 --}}
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" class="form-control form-control-sm" value="{{ Auth::user()->name }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="username">Nomor Induk Siswa Nasional (NISN)</label>
                            <input type="text" class="form-control form-control-sm" value="{{ Auth::user()->username }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Aktif</label>
                            <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}">
                            @error('email')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" id="gender"
                                class="form-control form-control-sm @error('gender') is-invalid @enderror">
                                <option value="">--pilih--</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('gender')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tahun_masuk">Tahun Masuk</label>
                            <input type="number"
                                class="form-control form-control-sm @error('tahun_masuk') is-invalid @enderror"
                                name="tahun_masuk" value="{{ old('tahun_masuk') }}">
                            @error('tahun_masuk')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>


                    </div>
                    {{-- col 2 --}}
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text"
                                        class="form-control form-control-sm @error('tempat_lahir') is-invalid @enderror"
                                        name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                                    @error('tempat_lahir')
                                        <small class='text-danger'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date"
                                        class="form-control form-control-sm @error('tanggal_lahir') is-invalid @enderror"
                                        name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                    @error('tanggal_lahir')
                                        <small class='text-danger'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select name="agama" id="agama"
                                class="form-control form-control-sm @error('agama') is-invalid @enderror">
                                <option value="">--pilih--</option>
                                @foreach ($agama as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('agama')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select name="kelas" id="kelas"
                                class="form-control form-control-sm @error('kelas') is-invalid @enderror">
                                <option value="">--pilih--</option>
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->kode_kelas }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('kelas')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan" id="jurusan"
                                class="form-control form-control-sm @error('jurusan') is-invalid @enderror">
                                <option value="">--pilih--</option>
                                @foreach ($jurusan as $item)
                                    <option value="{{ $item->kode_jurusan }}">{{ $item->kode_jurusan }}</option>
                                @endforeach
                            </select>
                            @error('jurusan')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                    name="image" value="{{ old('image') }}" id="image" onchange="userProfile()">
                            </div>
                            <div class="col-md-4">
                                <img src="" width="70%" id="viewGambar">
                            </div>
                            @error('image')
                                <span class='text-danger'>{{ $message }}</span>
                            @enderror

                        </div>

                    </div>
                    {{-- col 3 --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text"
                                class="form-control form-control-sm @error('alamat') is-invalid @enderror" name="alamat"
                                value="{{ old('alamat') }}">
                            @error('alamat')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text"
                                class="form-control form-control-sm @error('kecamatan') is-invalid @enderror"
                                name="kecamatan" value="{{ old('kecamatan') }}">
                            @error('kecamatan')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kabupaten">Kabupaten</label>
                            <input type="text"
                                class="form-control form-control-sm @error('kabupaten') is-invalid @enderror"
                                name="kabupaten" value="{{ old('kabupaten') }}">
                            @error('kabupaten')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <input type="text"
                                class="form-control form-control-sm @error('provinsi') is-invalid @enderror"
                                name="provinsi" value="{{ old('provinsi') }}">
                            @error('provinsi')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_hp_wali">Nomor Hp Orang Tua</label>
                            <input type="number"
                                class="form-control form-control-sm @error('no_hp_wali') is-invalid @enderror"
                                name="no_hp_wali" value="{{ old('no_hp_wali') }}">
                            @error('no_hp_wali')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-gradient-primary btn-sm">
                    Simpan Biodata
                </button>
            </div>
        </form>
    </div>

@endsection
@push('javascript')
    <script>
        //image preview
        function userProfile() {
            viewGambar.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endpush
