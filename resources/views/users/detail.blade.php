<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="d-flex justify-content-center">
            @if (!$user->biodata)
                <img src="{{ asset('storage/gambar/users/user_default.png') }}" width="25%">
            @else
                <img src="{{ asset('storage/gambar/users/' . $user->biodata->image) }}" width="25%">
            @endif

        </div>
        <table class="table table-bordered mt-3">

            <tr>
                <td width="20%">Nama</td>
                <td width="2%">:</td>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <td>Username/NISN</td>
                <td>:</td>
                <td>{{ $user->username }}</td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td>
                    {{ $user->biodata == null ? 'Biodata Kosong' : $user->biodata->jurusan->name }} -
                    {{ $user->biodata == null ? 'Biodata Kosong' : $user->biodata->jurusan->kode_jurusan }}
                </td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>
                    {{ $user->biodata == null ? 'Biodata Kosong' : $user->biodata->kelas->name }}
                </td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>
                    {{ $user->biodata == null ? 'Biodata Kosong' : $user->biodata->agama->name }}
                </td>
            </tr>
            <tr>
                <td>Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>
                    {{ $user->biodata == null ? 'Biodata Kosong' : $user->biodata->tempat_lahir }} /
                    {{ $user->biodata == null ? 'Biodata Kosong' : Carbon\Carbon::parse($user->biodata->tanggal_lahir)->format('d-m-Y') }}
                </td>
            </tr>
            <tr>
                <td>Tahun Masuk</td>
                <td>:</td>
                <td>
                    {{ $user->biodata == null ? 'Biodata Kosong' : $user->biodata->tahun_masuk }}
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                    {{ $user->biodata == null ? 'Biodata Kosong' : $user->biodata->alamat }}
                </td>
            </tr>
            <tr>
                <td>Kecamatan</td>
                <td>:</td>
                <td>
                    {{ $user->biodata == null ? 'Biodata Kosong' : $user->biodata->kecamatan }}
                </td>
            </tr>
            <tr>
                <td>Kabupaten</td>
                <td>:</td>
                <td>
                    {{ $user->biodata == null ? 'Biodata Kosong' : $user->biodata->kabupaten }}
                </td>
            </tr>
            <tr>
                <td>Provinsi</td>
                <td>:</td>
                <td>
                    {{ $user->biodata == null ? 'Biodata Kosong' : $user->biodata->provinsi }}
                </td>
            </tr>
            <tr>
                <td>Nomor Hp Wali</td>
                <td>:</td>
                <td>
                    Hubungi-
                    <a
                        href=" https://wa.me/{{ $user->biodata == null ? 'Biodata Kosong' : $user->biodata->no_hp_wali }}">{{ $user->biodata == null ? 'Biodata Kosong' : $user->biodata->no_hp_wali }}</a>
                </td>
            </tr>
        </table>
    </div>
</div>
