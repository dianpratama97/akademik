@extends('layouts.app')
@section('title', 'REKAP ABSENSI SISWA SMKN 1 SINGKEP')
@section('content')
    <div class="row mb-2">
        <div class="col-md-6">
            <a href="{{ route('absensi.sakit') }}" class="btn btn-block btn-relief-primary">DATA SAKIT</a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('absensi.izin') }}" class="btn btn-block btn-relief-warning">DATA IZIN</a>
        </div>
    </div>
    <div class="card">
        <form>
            @csrf
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <select name="bulan" id="bulan" class="form-control form-control-sm">
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mai</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="number" id="tahun" class="form-control form-control-sm" name="tahun"
                            placeholder="Tahun 1945">
                    </div>
                    <div class="col-md-3">
                        <select name="kelas" id="kelas" class="form-control form-control-sm">
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="jurusan" id="jurusan" class="form-control form-control-sm">
                            <option value="DKV">DKV</option>
                            <option value="TKJ">TKJ</option>
                            <option value="LP">LP</option>
                            <option value="TSM">TSM</option>
                        </select>
                    </div>
                    <div class="col-md-4 mt-1">
                        <button type="submit" class="btn btn-sm ml-3 btn-relief-success btn-submit">TAMPIL DATA</button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <h2 class="text-center">REKAP ABSEN</h2>
                <div id="load_data"></div>
            </div>
        </form>
    </div>

@endsection

@push('css')
    <style>
        table {
            border: 1px solid rgb(0, 0, 0);
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
        }

        table tr th {
            background: rgb(2, 145, 206);
            border: 1px solid rgb(0, 0, 0);
            padding: .35em;
        }

        table th,
        table td {
            padding: .625em;
            text-align: center;
        }

        table th {
            font-size: .85em;
            letter-spacing: .1em;
            text-transform: uppercase;
            /* background: green; */
            color: white;
        }


        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }

            table tr {
                /* border-bottom: 3px solid green; */
                display: block;
                margin-bottom: .725em;
            }

            table td {
                /* border-bottom: 1px solid green; */
                display: block;
                font-size: .8em;
                text-align: right;
            }

        }

        .rekap tr td {
            border: 1px solid #000000;
        }
    </style>
@endpush

@push('js-internal')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-submit").click(function(e) {
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var bulan = $("#bulan").val();
                var tahun = $("#tahun").val();
                var jurusan = $("#jurusan").val();
                var kelas = $("#kelas").val();
                $.ajax({
                    url: "{{ route('absensi.getDataRekap') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        tahun: tahun,
                        bulan: bulan,
                        jurusan: jurusan,
                        kelas: kelas
                    },
                    success: function(res) {
                        $("#load_data").html(res);
                    }
                });
            });
        });
    </script>
@endpush
