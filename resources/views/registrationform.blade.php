@extends('layouts.app')

@section('content')

<div>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="center">
        @if (session('success_registration'))
            <div class="alert alert-success" role="alert">
                {{ session('success_registration') }}
            </div>
        @endif
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-3 mt-2">
                        <img src="./img/logo.png" alt="Logo" class="" width="80" height="80">
                        <p class="mb-0 font-weight-bold" style="font-size: 19px;">Pagasa National High School</p>
                        <p class="mb-0" style="font-size: 15px">Student Enrollment System</p>
                    </div>

                    <div class="text-center mb-3 mt-2">
                        <p class="mb-0 font-weight-bold" style="font-size: 15px; background-color: #007bff; color:white;">Online Registration Form</p>
                    </div>
                    

                    <form method="POST" action="{{ route('registrationform') }}" enctype="multipart/form-data">
                        @CSRF
                        <div class="text-left mb-3 mt-2">
                            <h3>Personal Information</h3>
                        </div>
						<div class="form-group mb-3">
                            <!-- {{-- <span class="input-group-text" style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem;" ><i class="fa fa-user"></i></span> --}}
                            {{-- <input id="name" type="text" placeholder="Learner Type" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus> --}} -->
                            
                            <label for="learner_type_id">Learner Type <span class="text-danger">*</span> </label>
                            <select class="form-control @error('learner_type_id') is-invalid @enderror" name="learner_type_id" id="learner_type_id" value="{{ old('learner_type_id') }}" required>
                                <option disabled selected>Select</option>
                                @foreach ($learnerTypes as $learnerType)
                                    <option value="{{ $learnerType->id}}">{{ $learnerType->learner_type }}</option>
                                @endforeach
                            </select>

                            @error('learner_type_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

						<div class="form-group mb-3">
                            {{-- <span class="input-group-text" style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem;" ><i class="fa fa-key"></i></span> --}}
                            
                            <label for="lrn">Learner Reference Number</label>
                            <input id="lrn" type="text" placeholder="Enter 12 Digit LRN Learner Reference Number (refer to your SF9/F138)" value="{{ old('lrn') }}" class="form-control @error('lrn') is-invalid @enderror" name="lrn" >
                            @error('lrn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- <span class="input-group-text mb-1" style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem;" ><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student's Complete Name</span> --}}
                        <div class="row">

                            <div class="col-sm-4">
                                <label for="last_name">Last Name <span class="text-danger">*</span> </label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name*" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <label for="first_name">First Name <span class="text-danger">*</span> </label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name*" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" >
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <label for="middle_name">Middle Name</label>
                                <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" placeholder="Middle Name" name="middle_name" value="{{ old('middle_name') }}" >
                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <!-- <input id="extension" type="text" class="form-control @error('extension') is-invalid @enderror" placeholder="Extension" name="extension" value="{{ old('extension') }}" required autocomplete="extension" autofocus> -->
                                
                                <label for="extension">Extension Name</label>
                                <select class="form-select custom-select" id="extension" value="{{ old('extension') }}" name="extension">
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

                        
                        
                        
                        <div class="form-group mb-3">
                            {{-- <span class="input-group-text" style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem;" ><i class="fa fa-envelope"></i></span> --}}
                            
                            <label for="email">Email Address</label>
                            <input id="email" type="email" placeholder="Enter valid e-mail address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <label for="date_of_birth">Birthdate <span class="text-danger">*</span> </label>
                                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" placeholder="Middle Name" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth">
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="gender">Gender <span class="text-danger">*</span> </label>
                                <select class="form-select custom-select" id="gender" value="{{ old('gender') }}" name="gender" required autocomplete="gender" autofocus>
                                    <option disabled selected>Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select> 
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <!-- {{-- <span class="input-group-text" style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem;" ><i class="fa fa-envelope"></i></span> --}} -->
                            
                            <label for="psa">Contact No.</label>
                            <input id="picture" type="text" placeholder="Enter Contact No." class="form-control @error('picture') is-invalid @enderror" name="picture" value="{{ old('picture') }}"  autocomplete="picture">
                            @error('picture')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            {{-- <span class="input-group-text" style="border-top-right-radius: 0rem; border-bottom-right-radius: 0rem;" ><i class="fa fa-envelope"></i></span> --}}
                            
                            <label for="religion_id">Religion <span class="text-danger">*</span> </label>
                            <select class="form-select custom-select" id="religion_id" name="religion_id" value="{{ old('religion_id') }}" required autocomplete="religion_id">
                                <option disabled selected>Select</option>
                                @foreach ($religions as $religion)
                                    <option value="{{ $religion->id}}">{{ $religion->religion_name }}</option>
                                @endforeach
                            </select> 
                            @error('religion_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-2">
                            <label for="psa">Birth Certificate No.</label>
                            <input id="psa" type="text" placeholder="Enter PSA Birth Certificate No." class="form-control @error('psa') is-invalid @enderror" name="psa" value="{{ old('psa') }}"  autocomplete="psa">
                            @error('psa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="indigenous">Do you belong to the Indigenous People (IP) Community/Tribe? <span class="text-danger">*</span> </label>
                            <select class="form-select custom-select @error('indigenous') is-invalid @enderror" id="indigenous" name="indigenous" required  value="{{ old('indigenous') }}" autocomplete="indigenous" autofocus>
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
                            <label for="mother_tongue_id">Mother Tongue <span class="text-danger">*</span> </label>
                            <select class="form-select custom-select @error('mother_tongue_id') is-invalid @enderror" id="mother_tongue_id" name="mother_tongue_id" value="{{ old('mother_tongue_id') }}" required autocomplete="mother_tongue_id" autofocus>
                                <option disabled selected>Select</option>
                                @foreach ($motherTongues as $motherTongue)
                                    <option value="{{ $motherTongue->id}}">{{ $motherTongue->mother_tongue }}</option>
                                @endforeach
                            </select> 
                            @error('mother_tongue_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="special_educational">Are you a Learner with Special Educational Need (LSEN) or PWD? <span class="text-danger">*</span> </label>
                            <select class="form-select custom-select @error('special_educational') is-invalid @enderror" id="special_educational" name="special_educational" value="{{ old('special_educational') }}" required autocomplete="special_educational" autofocus>
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
                            <label for="specify_lrn">If you answer "Yes" as LSEN/PWD, please specify the category</label>
                            <input id="specify_lrn" type="text" placeholder="Specify LRN" value="{{ old('specify_lrn') }}" class="form-control" name="specify_lrn" />
                            @error('specify_lrn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <hr>
                        <h3>Address</h3>
                        <div class="form-group mb-2">
                            <label for="region">Region <span class="text-danger">*</span></label>
                            <input id="region" type="text" placeholder="Enter Region" class="form-control" name="region" value="{{ old('region') }}" required autocomplete="region"/>
                            @error('region')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="province">Province <span class="text-danger">*</span></label>
                            <input id="province" type="text" placeholder="Enter Province" class="form-control" name="province" value="{{ old('province') }}" required autocomplete="province" autofocus/>
                            @error('province')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="city_municipality">City/Municipality <span class="text-danger">*</span></label>
                            <input id="city_municipality" type="text" placeholder="Enter City or Municipality" class="form-control" name="city_municipality" value="{{ old('city_municipality') }}" required autocomplete="city_municipality" autofocus/>
                            @error('city_municipality')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="barangay">Barangay <span class="text-danger">*</span></label>
                            <input id="barangay" type="text" placeholder="Enter Barangay" class="form-control" name="barangay" value="{{ old('barangay') }}" required autocomplete="barangay" autofocus/>
                            @error('barangay')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="house_no_street">House No. and Street <span class="text-danger">*</span></label>
                            <input id="house_no_street" type="text" placeholder="Enter House Number and Street" class="form-control" name="house_no_street" value="{{ old('houe_no_street') }}"/>
                            @error('barangay')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <hr>
                        <h3>Parent/Guardian Information</h3>
                        
                        <div class="form-group mb-2">
                            <label for="father_name">Father's Name <span class="text-danger">*</span></label>
                            <input id="father_name" type="text" placeholder="Enter Father's Name" class="form-control" name="father_name" required value="{{ old('father_name') }}" autocomplete="father_name" autofocus/>
                            <small id="passwordHelpInline" class="text-muted">
                                Last Name, First Name, Middle Name
                            </small>
                        </div>
                        <div class="form-group mb-2">
                            <label for="father_education">Father’s Highest Educational Attainment</label>
                                <select class="form-select custom-select" id="father_education" name="father_education" value="{{ old('father_education') }}">
                                    <option disabled selected>Select</option>
                                    <option value="Elementary">Elementary</option>
                                    <option value="High School">High School</option>
                                    <option value="Technical/Vocational">Technical/Vocational</option>
                                    <option value="College Undergraduate">College Undergraduate</option>
                                    <option value="College Graduate">College Graduate</option>
                                    <option value="Master's Degree">Master's Degree</option>
                                    <option value="Doctorate Degree">Doctorate Degree</option>
                                </select> 
                                @error('father_education')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <!-- <label for="father_education">Father’s Highest Educational Attainment</label>
                            <input id="father_education" type="text" placeholder="Enter Highest Educational Attainment" class="form-control" name="father_education"/> -->
                        </div>
                        <div class="form-group mb-2">
                            <label for="father_employment">Father’s Employment Status</label>
                            <input id="father_employment" type="text" placeholder="Enter Employment Status" class="form-control" name="father_employment" value="{{ old('father_employment') }}"/>
                        </div>
                        <div class="form-group mb-2">
                            <label for="father_number">Father’s Contact Number</label>
                            <input id="father_number" type="text" placeholder="Enter Contact Number" class="form-control" name="father_number" value="{{ old('father_number') }}"/>
                        </div>

                        <div class="form-group mb-2">
                            <label for="mother_name">Mother's name <span class="text-danger">*</span></label>
                            <input id="mother_name" type="text" placeholder="Enter Mother's Name" class="form-control" name="mother_name" required autocomplete="mother_name" value="{{ old('mother_name') }}" autofocus/>
                            <small id="passwordHelpInline" class="text-muted">
                                Last Name, First Name, Middle Name
                            </small>
                        </div>
                        
                        <div class="form-group mb-2">
                            <label for="mother_education">Mother’s Highest Educational Attainment</label>
                            <select class="form-select custom-select" id="mother_education" name="mother_education" value="{{ old('mother_education') }}">
                                <option disabled selected>Select</option>
                                <option value="Elementary">Elementary</option>
                                <option value="High School">High School</option>
                                <option value="Technical/Vocational">Technical/Vocational</option>
                                <option value="College Undergraduate">College Undergraduate</option>
                                <option value="College Graduate">College Graduate</option>
                                <option value="Master's Degree">Master's Degree</option>
                                <option value="Doctorate Degree">Doctorate Degree</option>
                            </select> 
                            @error('mother_education')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!-- <label for="mothe r_education">Mother's Highest Educational Attainment</label>
                            <input id="mother_education" type="text" placeholder="Enter Highest Educational Attainment" class="form-control" name="mother_education"/> -->
                        </div>
                        <div class="form-group mb-2">
                            <label for="mother_employment">Mother's Employment Status</label>
                            <input id="mother_employment" type="text" placeholder="Enter Employment Status" class="form-control" name="mother_employment" value="{{ old('mother_employment') }}"/>
                        </div>
                        <div class="form-group mb-2">
                            <label for="mother_number">Mother's Contact Number</label>
                            <input id="mother_number" type="text" placeholder="Enter Contact Number" class="form-control" name="mother_number" value="{{ old('mother_numbe') }}"/>
                        </div>

                        
                        <div class="form-group mb-2">
                            <label for="guardian_name">Guardian's name <span class="text-danger">*</span></label>
                            <input id="guardian_name" type="text" placeholder="Enter Guardian's Name" class="form-control" name="guardian_name"  value="{{ old('guardian_name') }}" required autocomplete="guardian_name" autofocus/>
                            <small id="passwordHelpInline" class="text-muted">
                                Last Name, First Name, Middle Name
                            </small>
                        </div>
                        
                        <div class="form-group mb-2">
                        <label for="guardian_education">Guardian’s Highest Educational Attainment</label>
                            <select class="form-select custom-select" id="guardian_education" name="guardian_education" value="{{ old('guardian_education') }}">
                                <option disabled selected>Select</option>
                                <option value="Elementary">Elementary</option>
                                <option value="High School">High School</option>
                                <option value="Technical/Vocational">Technical/Vocational</option>
                                <option value="College Undergraduate">College Undergraduate</option>
                                <option value="College Graduate">College Graduate</option>
                                <option value="Master's Degree">Master's Degree</option>
                                <option value="Doctorate Degree">Doctorate Degree</option>
                            </select> 
                            @error('guardian_education')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!-- <label for="guardian_education">Guardian's Highest Educational Attainment</label>
                            <input id="guardian_education" type="text" placeholder="Enter Highest Educational Attainment" class="form-control" name="guardian_education"/> -->
                        </div>
                        <div class="form-group mb-2">
                            <label for="guardian_employment">Guardian's Employment Status</label>
                            <input id="guardian_employment" type="text" placeholder="Enter Employment Status" class="form-control" name="guardian_employment" value="{{ old('guardian_employment') }}"/>
                        </div>
                        <div class="form-group mb-2">
                            <label for="guardian_number">Guardian's Contact Number</label>
                            <input id="guardian_number" type="text" placeholder="Enter Contact Number" class="form-control" name="guardian_number" value="{{ old('guardian_number') }}"/>
                        </div>

                        <hr>
                        <h3>Admission Data</h3>
                        <div class="form-group mb-3">
                            <label for="key_stage">Key Stage <span class="text-danger">*</span> </label>
                            <select class="form-control @error('key_stage') is-invalid @enderror" name="key_stage" id="key_stage" onchange="change()" required  value="{{ old('key_stage') }}" autocomplete="key_stage" autofocus>
                                <option disabled selected>Select</option>
                                <option value="jhs">Junior High School (G7 to G10)</option>
                                <option value="shs">Senior High School</option>
                            </select>
                        </div>
                        <div class="form-group mb-2" id="for_jh" style="display: none">
                            <label for="jhs_grade_level">If Junior High School, input Grade Level to enrol<span class="text-danger">*</span></label>
                            <!-- <input id="jhs_grade_level" type="text" placeholder="Enter Grade Level" class="form-control" name="jhs_grade_level"/> -->
                            <select class="form-control @error('jhs_grade_level') is-invalid @enderror" name="jhs_grade_level" id="jhs_grade_level" value="{{ old('jhs_grade_level') }}">
                                <option disabled selected>Select</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </div>
                        <div class="form-group mb-2" id="for_sh" style="display: none">
                            <label for="strand_id">If Senior High School, select STRAND <span class="text-danger">*</span></label>
                            <select class="form-control @error('strand_id') is-invalid @enderror" name="strand_id" id="strand_id" value="{{ old('strand_id') }}">
                                <option disabled selected>Select</option>
                                @foreach ($strands as $strand)
                                    <option value="{{ $strand->id}}">{{ $strand->strand_name }}</option>
                                @endforeach
                                <!-- {{-- {{ $student->strand->strand_name }} --}} -->
                            </select>
                            @error('strand_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- <div class="form-group mb-2">
                            <label for="school_year">School Year</label>
                            <input id="school_year" type="text" placeholder="Enter School Year (e.g. 2020-2021)" class="form-control" name="school_year" required/>
                        </div> -->

                        <div class="form-group mb-2">
                            <label for="schoolyear_id">School Year <span class="text-danger">*</span> </label>
                            <select class="form-select custom-select @error('schoolyear_id') is-invalid @enderror" id="schoolyear_id" name="schoolyear_id"  value="{{ old('schoolyear_id') }} required autocomplete="schoolyear_id" autofocus> 
                                <option disabled selected>Select School Year</option>
                                @foreach ($schoolyears as $schoolyear)
                                    <option value="{{ $schoolyear->id}}">{{ $schoolyear->schoolyear }}</option>
                                @endforeach
                            </select> 
                            @error('schoolyear_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="requirement">Upload Requirements<span class="text-danger">*</span> </label>
                            <input type="file" name="requirement" id="requirement" ref="requirement" accept="application/pdf" value="{{ old('requirement') }}" required autocomplete="requirement" autofocus > <br>
                            <small id="passwordHelpInline" class="text-muted">
                                *The requirements shall be scanned and saved as one PDF file.
                            </small>
                            @error('requirement')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                <div class="card-footer text-muted">
                        <label class="float-left">System Version 1.0</label>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection