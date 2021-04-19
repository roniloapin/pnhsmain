@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="container center" style="width: 800px;">
            <div class="container card">
                <div class="card-body">
                    <div class="text-center mb-3 mt-2">
                        <img src="./img/logo.png" alt="Logo" class="" width="80" height="80">
                        <p class="mb-0 font-weight-bold" style="font-size: 19px">Legazpi City National High School</p>
                        <p class="mb-0" style="font-size: 15px">Student Enrollment System</p>
                    </div>

                    <div class="text-center mb-3 mt-2">
                        <p class="mb-0 font-weight-bold" style="font-size: 15px; background-color: #007bff; color:white;">Online Registration Form</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @CSRF
                        <div class="text-left mb-3 mt-2">
                            <p class="mb-0 font-weight-bold " style="font-size: 15px;  color:black;">&nbsp;&nbsp;Personal Information</p>
                        </div>
						<div class="input-group mb-3">
                            <span class="input-group-text" style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem;" ><i class="fa fa-user"></i></span>
                            <input id="name" type="text" placeholder="Learner Type" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            

                            @error('learner_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

						<div class="input-group mb-3">
                            <span class="input-group-text" style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem;" ><i class="fa fa-key"></i></span>
                            <input id="lrn" type="text" placeholder="Enter 12 Digit LRN Learner Reference Number (refer to your SF9/F138)" class="form-control @error('lrn') is-invalid @enderror" name="lrn" required autocomplete="lrn">
                            @error('lrn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <span class="input-group-text mb-1" style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem;" ><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student's Complete Name</span>
                        <div class="row">

                            <div class="col-sm-4 ">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name*" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name*" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" placeholder="Middle Name" name="middle_name" value="{{ old('middle_name') }}" required autocomplete="middle_name" autofocus>
                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <!-- <input id="extension" type="text" class="form-control @error('extension') is-invalid @enderror" placeholder="Extension" name="extension" value="{{ old('extension') }}" required autocomplete="extension" autofocus> -->
                                <select class="form-select custom-select" id="extension" name="extension">
                                    <option disabled selected>Extension</option>
                                    <option value="Jr">Jr</option>
                                    <option value="Sr">Sr</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                </select> 
                                @error('extension')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
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
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Register') }}
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection