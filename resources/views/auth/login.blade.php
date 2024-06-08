@extends('layouts.auth')

@section('title', 'Login')
@section('content')
    <form class="pt-3" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control form-control-lg" id="input_type"
                placeholder="Nomor Induk Siswa Nasional (NISN)" name="input_type">
            @error('username')
                <small class='text-danger'>{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-lg" id="password" placeholder="Password"
                name="password">
            @error('password')
                <small class='text-danger'>{{ $message }}</small>
            @enderror
        </div>
        <div class="mt-3">
            <button type="submit"
                class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
        </div>
    </form>
@endsection
