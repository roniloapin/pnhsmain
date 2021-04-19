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
                            {{-- <input id="name" type="text" placeholder="Learner Type" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus> --}}
                            <select class="form-control @error('learner_type') is-invalid @enderror" name="learner_type" id="learner_type">
                                <option disabled selected>Learner Type</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>

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
                        <div class="row mb-2">
                            <div class="col-6">
                                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" placeholder="Middle Name" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth">
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <select class="form-select custom-select" id="gender" name="gender">
                                    <option disabled selected>Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select> 
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text" style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem;" ><i class="fa fa-envelope"></i></span>
                            <input id="religion" type="text" placeholder="Enter Religion" class="form-control @error('religion') is-invalid @enderror" name="religion" value="{{ old('religion') }}"  autocomplete="religion">
                            @error('religion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-2">
                            <span class="input-group-text" style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem;" ><i class="fa fa-envelope"></i></span>
                            <input id="psa" type="text" placeholder="Enter PSA Birth Certificate No." class="form-control @error('psa') is-invalid @enderror" name="psa" value="{{ old('psa') }}"  autocomplete="psa">
                            @error('psa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="indigenous">Do you belong to the Indigenous People (IP) Community/Tribe?</label>
                            <select class="form-select custom-select @error('indigenous') is-invalid @enderror" id="mothe_tongue" name="mothe_tongue">
                                <option disabled selected>Select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select> 
                            @error('indigenous')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="indigenous">Mother Tongue</label>
                            <select class="form-select custom-select @error('indigenous') is-invalid @enderror" id="mothe_tongue" name="mothe_tongue">
                                <option disabled selected>Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select> 
                            @error('mothe_tongue')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="special_educational">Are you a Learner with Special Educational Need (LSEN) or PWD?</label>
                            <select class="form-select custom-select @error('special_educational') is-invalid @enderror" id="mothe_tongue" name="mothe_tongue">
                                <option disabled selected>Select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select> 
                            @error('special_educational')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="specify">Are you a Learner with Special Educational Need (LSEN) or PWD?</label>
                            <input id="specify" type="text" placeholder="Specify" class="form-control" name="lrn" />
                        </div>
                        <hr>
                        <h3>Address</h3>
                        <div class="form-group mb-2">
                            <label for="region">Region</label>
                            <input id="region" type="text" placeholder="Enter Region" class="form-control" name="region" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="province">Province</label>
                            <input id="province" type="text" placeholder="Enter Province" class="form-control" name="province" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="house_no_street">House No. and Street</label>
                            <input id="house_no_street" type="text" placeholder="Enter House Number and Street" class="form-control" name="house_no_street" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="city_municipality">City/Municipality</label>
                            <input id="city_municipality" type="text" placeholder="Enter City or Municipality" class="form-control" name="city_municipality" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="barangay">Barangay</label>
                            <input id="barangay" type="text" placeholder="Enter Barangay" class="form-control" name="barangay" />
                        </div>
                        <hr>
                        <h3>Parent/Guardian Information</h3>
                        <div class="form-group mb-2">
                            <label for="father_name">Father's name</label>
                            <input id="father_name" type="text" placeholder="Enter Father's Name" class="form-control" name="father_name" />
                            <small id="passwordHelpInline" class="text-muted">
                                Last Name, First Name, Middle Name
                            </small>
                        </div>
                        <div class="form-group mb-2">
                            <label for="father_education">Father’s Highest Educational Attainment</label>
                            <input id="father_education" type="text" placeholder="Enter Highest Educational Attainment" class="form-control" name="father_education" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="father_employment">Father’s Employment Status</label>
                            <input id="father_employment" type="text" placeholder="Enter Employment Status" class="form-control" name="father_employment" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="father_number">Father’s Contact Number</label>
                            <input id="father_number" type="text" placeholder="Enter Contact Number" class="form-control" name="father_number" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="father_name">Mother name</label>
                            <input id="father_name" type="text" placeholder="Enter Mother's Name" class="form-control" name="father_name" />
                            <small id="passwordHelpInline" class="text-muted">
                                Last Name, First Name, Middle Name
                            </small>
                        </div>
                        <div class="form-group mb-2">
                            <label for="mother_education">Mother's Highest Educational Attainment</label>
                            <input id="mother_education" type="text" placeholder="Enter Highest Educational Attainment" class="form-control" name="mother_education" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="mother_employment">Mother's Employment Status</label>
                            <input id="mother_employment" type="text" placeholder="Enter Employment Status" class="form-control" name="mother_employment" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="mother_number">Mother's Contact Number</label>
                            <input id="mother_number" type="text" placeholder="Enter Contact Number" class="form-control" name="mother_number" />
                        </div>
                        
                        {{-- Button --}}
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