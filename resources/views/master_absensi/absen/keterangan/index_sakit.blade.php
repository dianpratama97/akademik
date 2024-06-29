@extends('layouts.app')
@section('title', 'REKAP SAKIT SISWA KELAS 12')
@section('content')
    <div class="row mb-2">
        <div class="col-md-6">
            <a href="{{ route('absensi.rekap') }}" class="btn btn-block btn-relief-success">DATA REKAP</a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('absensi.izin') }}" class="btn btn-block btn-relief-warning">DATA IZIN</a>
        </div>
    </div>
    <div class="card">
        
        <form>
            @csrf
            <div class="card-header">
                <h2 class="text-center">REKAP SAKIT</h2>

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
                <input type="hidden" id="input_keterangan" name="input_keterangan" value="s">

            </div>
            <div class="card-body">
                <div id="load_data_sakit"></div>
            </div>
        </form>
    </div>


    
@endsection


@push('js-internal')
    
    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-submit").click(function(e) {
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var bulan = $("#bulan").val();
                var input_keterangan = $("#input_keterangan").val();
                var tahun = $("#tahun").val();
                var kelas = $("#kelas").val();
                var jurusan = $("#jurusan").val();
                $.ajax({
                    url: "{{ route('absensi.getDataKetarangan') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        tahun: tahun,
                        input_keterangan: input_keterangan,
                        bulan: bulan,
                        kelas: kelas,
                        jurusan: jurusan
                    },
                    success: function(res) {
                        $("#load_data_sakit").html(res);
                    }
                });
            });
        });
    </script>
@endpush

@push('css')
    <style>
        .rekap {
            width: 100%;
            border-collapse: collapse;
        }

        .rekap tr th {
            border: 1px solid #000000;
            padding: 10px;
            font-size: 10px;
        }

        .rekap tr td {
            border: 1px solid #000000;
            padding: 10px;
            font-size: 10px;
        }
    </style>
@endpush
