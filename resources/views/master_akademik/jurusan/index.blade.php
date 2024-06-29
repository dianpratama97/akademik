@extends('layouts.app')
@section('content')
@section('title', 'halaman jurusan')

<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-relief-primary" data-bs-toggle="modal" data-bs-target="#tambah">
            Tambah
        </button>
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="text-capitalize">
                <tr>
                    <th>no</th>
                    <th>nama jurusan</th>
                    <th>kode jurusan</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->kode_jurusan }}</td>
                        <td>
                            <form method="post" role="alert" action="{{ route('jurusan.destroy', $item->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn action btn-relief-danger btn-sm delete-confirm"><i
                                        class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('master_akademik.jurusan.aksi')
@endsection
