@extends('layouts.app')
@section('title', 'halaman users')
@section('content')

    <div class="card">

        <form method="post" role="alert" action="{{ url('hapusAllUser') }}" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <div class="card-header ">
                <div class="card " style="width: 25rem;">
                    <ul class="list-group list-group-flush ">
                        <li class="list-group-item d-grid gap-2">
                            <button type="button" class="btn btn-gradient-success btn-sm btn-block text-capitalize"
                                data-bs-toggle="modal" data-bs-target="#modal-upload">upload excel</button>
                        </li>
                        <li class="list-group-item d-grid gap-2">
                            <button type="button" class="btn btn-gradient-primary btn-sm btn-block text-capitalize"
                                data-bs-toggle="modal" data-bs-target="#modal-tambah">tambah</button>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6 d-grid gap-2">
                                    <button type="submit"
                                        class="btn btn-danger btn-sm btn-block text-capitalize delete-confirm">
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
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </form>
    </div>
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
        <div class="modal-dialog modal-detail"></div>
    </div>

@endsection
@include('users.js')
