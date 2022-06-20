@extends('layouts.app')

<style>



    body {

        background: url({{asset('images/bg.jpg')}})!important;
        background-size: cover!important;

    }

    .form_login {

        background: #fff;

        padding: 3rem;

    }



    nav.navbar.navbar-expand-md.navbar-light.bg-white.shadow-sm {

        display: none;

    }



    .login_btn {

        padding: 1rem 3rem;

        border: none;

        align-items: center;

        background: #6200ea;

        cursor: pointer;

        color: #fff !important;

        text-decoration: none;

        transition-duration: 0.3s;

        font-weight: 400;

        margin-top: 2rem;

    }

</style>

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="form_login">

                <form method="POST" action="{{ route('login') }}">

                    @csrf

                    <div class="form-group">

                        <label for="email" class="form-label">{{ __('Correo electrónico') }}</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>



                        @error('email')

                            <span class="invalid-feedback" role="alert">

                                <strong>{{ $message }}</strong>

                            </span>

                        @enderror

                    </div>

                    <div class="form-group">

                        <label for="password" class="form-label">{{ __('Password') }}</label>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">



                        @error('password')

                            <span class="invalid-feedback" role="alert">

                                <strong>{{ $message }}</strong>

                            </span>

                        @enderror

                    </div>

    

                    <div class="form-check mb-4">

                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>



                        <label class="form-check-label" for="remember">

                            {{ __('Remember Me') }}

                        </label>

                    </div>

    

                    <button type="submit" class="login_btn">

                        {{ __('Login') }}

                    </button>



                    {{-- @if (Route::has('password.request'))

                        <a class="btn btn-lin" href="{{ route('password.request') }}">

                            {{ __('Forgot Your Password?') }}

                        </a>

                    @endif --}}

                </form>

            </div>

        </div>

    </div>

</div>

@endsection

