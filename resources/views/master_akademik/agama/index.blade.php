@extends('layouts.app')
@section('content')
@section('title', 'halaman agama')

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
                    <th>nama agama</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <form method="post" role="alert" action="{{ route('agama.destroy', $item->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-sm action btn-relief-danger delete-confirm"><i
                                        class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('master_akademik.agama.aksi')


@endsection

