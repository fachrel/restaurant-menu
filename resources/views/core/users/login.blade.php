@extends('layouts.auth')
@section('title', 'Login')
@section('content')
    <div class="row h-100 bg-primary">
        <div class="container d-flex justify-content-center align-items-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        {{-- <a href="index.html"><img src="{{ asset('dist/assets/compiled/svg/logo.svg') }}" style="width: 6rem" alt="Logo"></a> --}}
                    </div>
                    <h1>Log in</h1>
                    <p class="text-secondary">Silahkan login dengan data anda.</p>
                    <form action="{{ route('authenticate') }}" method="post">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="text" name="username" class="form-control form-control-lg" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-lg" placeholder="Password" name="password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2" type="submit">Log in</button>
                        <div class="text-center mt-3">
                            <p><a class="font-bold" href="auth-forgot-password.html">Home</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection