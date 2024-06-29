@extends('layouts.app')
@section('title', 'DATA ABSENSI SISWA KELAS 12')
@section('content')


    <div class="card">
        <div class="card-header">
            <h2 class="text-center mb-3">STATUS ABSEN</h2>
            <div class="form-group row col-md-6 ml-auto mr-auto">
                <label for="inputPassword" class="col-sm-3 col-form-label">TANGGAL</label>
                <div class="col-sm-8">
                    <input type="date" name="tanggal" value="" id="tanggal" class="form-control form-control-sm"
                        placeholder="Tanggl Absen" autocomplete="off">
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <h2 class="text-center"><span class="badge badge-info"></span></h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>JURUSAN</th>
                                <th>STATUS ABSEN</th>
                            </tr>
                        </thead>
                        <tbody id="load_data"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet"
        type="text/css" />
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
@endpush

@push('js-internal')
    <script>
        $(function() {
            $("#tanggal").datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd'
            }).datepicker('update', new Date());

            $("#tanggal").change(function(e) {
                var tanggal = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('absensi.getData') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        tanggal: tanggal
                    },
                    
                    cache: false,
                    success: function(res) {
                        $("#load_data").html(res);
                    }
                });
            });
        });
    </script>
@endpush
