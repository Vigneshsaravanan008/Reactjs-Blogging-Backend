@extends('auth.layouts.master')

@section('content')
    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
            <h2 class="card-title fw-bold mb-1">Welcome to Blogging! 👋</h2>
            <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>
            @include('layouts.message')
            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="mb-1">
                    <label class="form-label" for="login-email">Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="login-email" type="text"
                        name="email" placeholder="Enter the Email" aria-describedby="login-email" autofocus=""
                        tabindex="1" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-1">
                    <div class="d-flex justify-content-between">
                        <label for="login-password">Password</label>
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control form-control-merge @error('password') is-invalid @enderror"
                            id="login-password" type="password" name="password" placeholder="Enter the Password"
                            aria-describedby="login-password" tabindex="2" />
                        <span class="input-group-text cursor-pointer">
                            <i data-feather="eye"></i>
                        </span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100" tabindex="4">Sign in</button>
            </form>
        </div>
    </div>
@endsection
