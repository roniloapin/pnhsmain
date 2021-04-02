@extends('layouts.app')

<style>
    .bold-title{
        font-family: Tahoma;
        font-weight: bold;
    }
    .bold-title2{
        font-family: Tahoma;
    }
</style>


@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="container center" style="width: 500px;">
            <div class="container card">
                <div class="card-body">
                    <div class="text-center mb-3 mt-2">
                        <img src="./img/logo.png" alt="Logo" class="" width="80" height="80">
                        <p class="mb-0 font-weight-bold" style="font-size: 19px">Legazpi City National High School</p>
                        <p class="mb-0" style="font-size: 15px">Student Enrollment System</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @CSRF
                        <div class="input-group mb-3">
                            <span class="input-group-text" style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem;"><i class="fa fa-envelope"></i></span>
                            <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" aria-label="Email Address" aria-describedby="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem;"><i class="fa fa-key"></i></span>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" aria-describedby="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" checked="true" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>
                            </div>

                            <!-- <div class="col-md-12">
                                <a style="text-size:5px;" href="{{ route('register') }}">
                                    Not registered? Click here to register.
                                </a>
                            </div> -->

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
