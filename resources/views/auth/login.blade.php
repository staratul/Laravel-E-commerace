@extends('layouts.app')

@section('content')
<div class="layout-centered bg-img">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 bg-white rounded shadow-7 w-400 mw-100 p-6 my-5">
                <h4 class="my-3">Login</h4>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-Mail">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="pl-4">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif

                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <hr class="w-30">

                    <p class="text-center text-muted small-2">Not a member? <a href="{{ url('register') }}">Register</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@push('styles')
    <style>
        .layout-centered {
            background-image: url('img/4.jpg');
            background-color: #cccccc;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
@endpush
