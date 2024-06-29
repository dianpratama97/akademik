<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Download Kartu Pelajar - {{ Auth::user()->name }}</title>
</head>

<body>

    <div style="width: 8.5cm;">
        <div class="card" style="height: 5.5cm;">
            <div class="card-body">
                <img src="{{ asset('assets/images/1.png') }}"
                style="width: 319px; position: absolute; margin-top: -20px; margin-left: -20px">
                <p class="text-center" style="font-size: 8px; font-weight: bolder; margin-top: 25px"><u>KARTU
                        PELAJAR</u></p>
                        
                <table style="font-size: 8px; margin-top: -10px;font-family: arial;">
                    <tr>
                        <td>NAMA SISWA</td>
                        <td>:</td>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <td>NISN</td>
                        <td>:</td>
                        <td>{{ Auth::user()->username }}</td>
                    </tr>
                    <tr>
                        <td>TEMPAT, TANGAL LAHIR</td>
                        <td>:</td>
                        <td>{{ Auth::user()->biodata->tempat_lahir }}/{{ Carbon\Carbon::parse(Auth::user()->biodata->tanggal_lahir)->format('d-m-Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td>JENIS KELAMIN</td>
                        <td>:</td>
                        <td>{{ Auth::user()->biodata->gender }}</td>
                    </tr>
                    <tr>
                        <td>ALAMAT</td>
                        <td>:</td>
                        <td>{{ Auth::user()->biodata->alamat }}</td>
                    </tr>
                </table>
                
                <p style="position: absolute;font-size: 10px; font-family: arial; margin-left: 1px"><b>KELAS
                        :{{ Auth::user()->kelas }}
                        - {{ Auth::user()->jurusan }}</b></p>

                @if (auth()->user()->biodata->image == null)
                    <img src="https://cbt.e-smanpul.com/images/user_siswa.png"
                        style="position: absolute; width: 60px;  margin-top: -70px; margin-left: 210px">
                @else
                    <img src="{{ asset('storage/gambar/users/' . auth()->user()->biodata->image) }}"
                        style="position: absolute; width: 60px; height: 70px; margin-top: -70px; margin-left: 210px">
                @endif

                {{-- <hr style="margin-bottom: 10px"> --}}
                <h2
                    style="position: absolute;padding-left: 185px; margin-top: 5px; font-size: 7px; font-family: arial;">
                    Mengetahui, <br>Kepala Sekolah</h2>
                {{-- ttd --}}
                <img style="position: absolute;padding-left: 185px;padding-top: 20px; width: 60px"
                    class="img-responsive img" alt="Responsive image"
                    src="{{ asset('storage/gambar/configs/' . $config->ttd) }}">

                <br>
                {{-- cap --}}
                <img style="position: absolute; padding-left: 185px; margin-top: -10px; width: 40px"
                    class="img-responsive img" alt="Responsive image"
                    src="{{ asset('storage/gambar/configs/' . $config->cap) }}">
                <p
                    style="position: absolute; padding-left: 185px; margin-top: 20px; font-size: 7px; font-family: arial;">
                    <b>
                        <u>{{ $config->nama_kepsek }}</u>
                    </b><br>NIP. {{ $config->nip_kepsek }}
                </p>
            </div>
        </div>
    </div>

    <div style="width: 8.5cm; margin-top: 10px">
        <div class="card" style="height: 5.5cm;">
            <div class="card-body">
                <img src="{{ asset('assets/images/2.png') }}"
                    style="width: 319px; position: absolute; margin-top: -20px; margin-left: -20px">
                <div>
                    <div style="font-size: 7px; font-weight: bolder;">VISI :</div>
                    {{-- visi --}}
                    <div style="font-size: 6px; font-weight: bolder;">
                        {!! $config->visi !!}
                    </div>
                </div>
                <div style="margin-top: -15px; position: absolute;">
                    <div style="font-size: 7px; font-weight: bolder;">MISI :</div>
                    {{-- misi --}}
                    <div style="font-size: 5px; font-weight: bolder; margin-left: -30px; margin-right: 10px">
                        {!! $config->misi !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
