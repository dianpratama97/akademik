@extends('layouts.app')
@section('content')
@section('title', 'halaman tahun ajaran')

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
                    <th>semeser</th>
                    <th>tahun ajaran</th>
                    <th>status</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->semester }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->status == 1 ? 'aktif' : 'tidak aktif' }}</td>
                        <td>
                            <form method="post" role="alert" action="{{ route('tahunAjaran.destroy', $item->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm action  btn-relief-danger delete-confirm"><i
                                        class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('master_akademik.tahunAjaran.aksi')

@endsection
