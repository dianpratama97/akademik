@extends('layouts.app')

@section('title', 'HALAMAN ABSEN SISWA PKL')
@section('content')

    <form method="post" role="alert" action="{{ url('hapusAllUser') }}" enctype="multipart/form-data">
        @csrf
        @method('DELETE')

        <div class="card" style="width: 25rem;">
            <ul class="list-group list-group-flush ">
                <li class="list-group-item d-grid gap-2">
                    <button type="button" class="btn btn-relief-success btn-sm btn-block text-capitalize"
                        data-bs-toggle="modal" data-bs-target="#modal-upload">upload excel</button>
                </li>
                <li class="list-group-item d-grid gap-2">
                    <button type="button" class="btn btn-relief-primary btn-sm btn-block text-capitalize"
                        data-bs-toggle="modal" data-bs-target="#modal-tambah">tambah</button>
                </li>
                <li class="list-group-item d-grid gap-2">
                    <a href="{{ asset('berkas/format_user.xlsx') }}"
                        class="btn btn-relief-primary btn-sm btn-block text-capitalize">Download Format User</a>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-6 d-grid gap-2">
                            <button type="submit"
                                class="btn btn-relief-danger btn-sm btn-block text-capitalize delete-confirm">
                                <i class="fa fa-times"></i> hapus data
                            </button>
                        </div>
                        <div class="col-md-6">
                            <input type="checkbox" class="form-check-input" id="checkAll"
                                style="width: 30px; height: 28px;">
                            PILIH SEMUA
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="card">
            <div class="card-body">
                {!! $dataTable->table(['class' => 'table table-bordered table-sm table-hover'], true) !!}
            </div>
        </div>
    </form>
    <!-- Modal -->
    @include('users.upload')
    @include('users.tambah')
    {{-- modal edit --}}
    <div class="modal fade" id="modalAction" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl"></div>
    </div>
    {{-- modal detail --}}
    <div class="modal fade" id="modalDetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-detail"></div>
    </div>

@endsection
@include('users.js')
