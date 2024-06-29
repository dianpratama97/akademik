@extends('layouts.home')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card col-xl-4 col-md-12 ">
            <div class="card-body ">
                <h3 class="text-center">LOGIN</h3>
                <form class="pt-3" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="username">NISN</label>
                        <input type="text" class="form-control mb-2" id="input_type"
                            placeholder="Nomor Induk Siswa Nasional (NISN)" name="input_type">
                        @error('username')
                            <small class='text-danger'>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control mb-2" id="password" placeholder="Password"
                            name="password">
                        @error('password')
                            <small class='text-danger'>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('welcome') }}" class="btn btn-block btn-gradient-warning btn-lg font-weight-medium auth-form-btn">HOME</a>
                        <button type="submit"
                            class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
