@extends('layouts.app')
@section('title', 'halaman users aktif')
@section('content')

    <div class="card">

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>nama</th>
                        <th>email</th>
                        <th>waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($UserLogin as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
