@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="container center" style="width: 500px;">
            <div class="container card">
                <div class="card-body">
                    <div class="text-center mb-3 mt-2">
                        <img src="./img/logo.png" alt="Logo" class="" width="80" height="80">
                        <p class="mb-0 font-weight-bold" style="font-size: 19px">Pagasa National High School</p>
                        <p class="mb-0" style="font-size: 15px">Student Enrollment System</p>
                    </div>

                    <div class="text-center mb-3 mt-2">
                        <p class="mb-0 font-weight-bold" style="font-size: 15px; background-color: #007bff; color:white;">Online Registration Form</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @CSRF
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text" style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem;" ><i class="fa fa-user"></i></span>
                            <input id="name" type="text" placeholder="Name: Ex. Juan Dela Cruz" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text" style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem;" ><i class="fa fa-envelope"></i></span>
                            <input id="email" type="email" placeholder="Enter valid e-mail address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem;" ><i class="fa fa-key"></i></span>
                            <input id="password" type="password" placeholder="Password: Enter at least 8 characters" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem;" ><i class="fa fa-key"></i></span>
                            <input id="password-confirm" type="password" placeholder="Re-type password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Register') }}
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="card-footer text-muted">
                        <label class="float-left">System Version 1.0</label>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection