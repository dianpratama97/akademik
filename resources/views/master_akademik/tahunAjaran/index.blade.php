@extends('layouts.app')
@section('content')
@section('title', 'halaman tahun ajaran')

<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
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
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('tahunAjaran.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Tahun Ajaran</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <select name="semester" class="form-control" id="semester">
                            <option value="ganjil">Ganjil</option>
                            <option value="genap">Genal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-gradient-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('master_akademik.tahunAjaran.edit')
@endsection
