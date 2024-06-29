@extends('layouts.app')
@section('title', 'HAPUS FOTO ABSEN')
@section('content')
    <div class="card">
        <form method="post" role="alert" action="{{ url('hapusAllFoto') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-header">
                <h4 class="card-title">
                    <a href="" class="btn btn-relief-warning btn-sm"><i class="fas fa-users"></i>KEMBALI</a>
                    <button type="submit" class="btn btn-relief-danger btn-sm">
                        <i class="fa fa-times"></i> HAPUS DATA
                    </button>
                </h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll"> Pilih</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td scope="row">
                                    <input name='id[]' type="checkbox" id="checkItem" value="{{ $item->id }}">
                                </td>
                                <td>
                                    @if ($item->foto_absen == null)
                                        <span class="badge badge-danger">Foto Di Hapus</span>
                                    @else
                                        <img src="{{ asset('storage/foto-absen/' . $item->foto_absen) }}" width="50px">
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </div>

@endsection

@push('css')
@endpush

@push('js')
@endpush

@push('js-internal')
    <script language="javascript">
        $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@endpush
