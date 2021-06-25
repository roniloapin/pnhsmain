<template>
    <div class="container">
        <h3><strong> Junior High School Students</strong></h3>
        <nav class="mt-3">
            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                <a class="nav-item nav-link color-blue active" id="nav-student-approved-type-tab" data-toggle="tab" href="#nav-student-approved-type" role="tab" aria-controls="nav-student-approved-type" aria-selected="true"> <strong>Approved</strong> </a>
                <a class="nav-item nav-link color-blue" id="nav-student-pending-tab" data-toggle="tab" href="#nav-student-pending" role="tab" aria-controls="nav-student-pending" aria-selected="true"><strong>Pending</strong> </a>
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-student-approved-type" role="tabpanel" aria-labelledby="nav-approved-tab">
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-primary card-outline">
                                <h5 class="m-0 fas text-primary"> Approved Students</h5>
                                <div class="card-tools">
                                    <button class="btn btn-success btn-block p-1" @click="addNewStudent" title="Add New Student">Add New</button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" >
                                <table class="table table-head-fixed table-hover">
                                  <thead>
                                    <tr>
                                      <th>Action</th>
                                      <th>ID</th>
                                      <th>Name</th>
                                      <th>Grade Level</th>
                                      <th>Gender</th>
                                      <th>Status</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr v-if="approved_students.total == 0">
                                        <td colspan="6" class="text-center"><label>No records yet.</label></td>
                                    </tr>
                                    <tr v-for="student in approved_students.data" :key="student.id">
                                      <td>
                                        <a href="#" @click="editStudentModal(student)">
                                            <i class="fa fa-edit color-blue" title="Edit"></i>
                                        </a>
                                        |
                                        <a href="#" @click="deleteStudent(student.id)">
                                            <i class="fa fa-trash-alt color-red" title="Delete"></i>
                                        </a>
                                        |
                                        <a href="#">
                                            <i class="fas fa-eye color-green"></i>
                                        </a>
                                        |
                                        <a target="_blank" :href="'requirements/'+student.id+'/'+student.requirement">
                                            <i class="fas fa-file-pdf color-green"></i>
                                        </a>
                                      </td>
                                      <td>{{student.id}}</td>
                                      <td style="text-align:left;">{{student.last_name}},&nbsp;{{student.first_name}}&nbsp;{{student.middle_name}}</td>
                                      <td><span class="tag tag-success" style="text-align:center;">{{student.jhs_grade_level}}</span></td>
                                      <td>{{student.gender}}</td>
                                      <td>{{student.status}}</td>
                                    </tr>
                                    
                  
                                  </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                    <pagination :data="approved_students" @pagination-change-page="getStudentResults_a">
                                        <span slot="prev-nav">&lt; Previous</span>
                                        <span slot="next-nav">Next &gt;</span>
                                    </pagination>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>

            <div class="tab-pane fade show" id="nav-student-pending" role="tabpanel" aria-labelledby="nav-student-pending-tab">
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-primary card-outline">
                                <h5 class="m-0 fas text-primary"> Pending Students</h5>
                                <div class="card-tools">
                                    <button class="btn btn-success btn-block p-1" @click="addNewStudent" title="Add New Learner Type">Add New</button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" >
                                <table class="table table-head-fixed table-hover">
                                  <thead>
                                    <tr>
                                      <th>Action</th>
                                      <th>ID</th>
                                      <th>Name</th>
                                      <th>Grade Level</th>
                                      <th>Gender</th>
                                      <th>Status</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr v-if="pending_students.total == 0">
                                        <td colspan="6" class="text-center"><label>No records yet.</label></td>
                                    </tr>
                                    <tr v-for="student in pending_students.data" :key="student.id">
                                      <td>
                                        <a href="#" @click="editStudentModal(student)">
                                            <i class="fa fa-edit color-blue" title="Edit"></i>
                                        </a>
                                        |
                                        <a href="#" @click="deleteStudent(student.id)">
                                            <i class="fa fa-trash-alt color-red" title="Delete"></i>
                                        </a>
                                        |
                                        <a href="#">
                                            <i class="fas fa-eye color-green"></i>
                                        </a>
                                        |
                                        <a target="_blank" :href="'requirements/'+student.id+'/'+student.requirement">
                                            <i class="fas fa-file-pdf color-green"></i>
                                        </a>
                                      </td>
                                      <td>{{student.id}}s</td>
                                      <td style="text-align:left;">{{student.last_name}},&nbsp;{{student.first_name}}&nbsp;{{student.middle_name}}</td>
                                      <td><span class="tag tag-success" style="text-align:center;">{{student.jhs_grade_level}}</span></td>
                                      <td>{{student.gender}}</td>
                                      <td>{{student.status}}</td>
                                    </tr>
                                    
                                  </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                    <pagination :data="pending_students" @pagination-change-page="getStudentResults_p">
                                        <span slot="prev-nav">&lt; Previous</span>
                                        <span slot="next-nav">Next &gt;</span>
                                    </pagination>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>

        </div>

<!-- Modals  -->
    <!-- 1. Learner Type Modal -->
        <div class="modal fade" id="addNewStudent" tabindex="-1" role="dialog" aria-labelledby="addNewStudentTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editMode1" id="addNewStudentTitle"> Add</h5>
                            <h5 class="modal-title" v-show="editMode1" id="addNewStudentTitle"> Update</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode1 ? updateStudent() : createStudent()">
                        <div class="modal-body" style="height: 500px; overflow-y: auto;">
                            <div class="form-group mb-1">
                                <label for="learner_type_id">Learner Type <span class="text-danger">*</span> </label>
                                <select class="form-control"  name="learner_type_id"  v-model="form1.learner_type_id" :class="{ 'is-invalid': form1.errors.has('learner_type_id') }">
                                    <option value="" disabled selected>Select Learner Type</option>
                                    <option v-for="learner_type in learner_types.data" :key="learner_type.id" :value="learner_type.id" selected>{{ learner_type.learner_type}}</option>
                                    <has-error :form="form1" field="learner_type_id"></has-error>
                                </select>
                            </div>

                            <div class="form-group mb-1">
                                <label for="lrn">Learner Reference Number <span class="text-danger">*</span> </label>
                                <input v-model="form1.lrn" type="text" name="lrn"
                                    placeholder="Learner Reference Number"
                                    class="form-control" :class="{ 'is-invalid': form1.errors.has('lrn') }">
                                <has-error :form="form1" field="lrn"></has-error>
                            </div>

                            <div class="form-group mb-1">
                                    <label for="last_name">Last Name <span class="text-danger">*</span> </label>
                                    <input v-model="form1.last_name" type="text" name="last_name"
                                        placeholder="Last Name"
                                        class="form-control" :class="{ 'is-invalid': form1.errors.has('last_name') }">
                                    <has-error :form="form1" field="last_name"></has-error>
                            </div>

                            <div class="form-group mb-1">
                                <label for="last_name">First Name <span class="text-danger">*</span> </label>
                                <input v-model="form1.first_name" type="text" name="first_name"
                                    placeholder="First Name"
                                    class="form-control" :class="{ 'is-invalid': form1.errors.has('first_name') }">
                                <has-error :form="form1" field="first_name"></has-error>
                            </div>

                            <div class="form-group mb-1">
                                <label for="last_name">Middle Name </label>
                                <input v-model="form1.middle_name" type="text" name="middle_name"
                                    placeholder="Middle Name"
                                    class="form-control" :class="{ 'is-invalid': form1.errors.has('middle_name') }">
                                <has-error :form="form1" field="middle_name"></has-error>
                            </div>

                            <div class="form-group mb-1">
                                <label for="extension">Extension </label>
                                <select name="extension" v-model="form1.extension" id="extension" class="form-control custom-select" aria-placeholder="Select Extension Name"
                                    :class="{
                                    'is-invalid': form1.errors.has('extension') }">
                                    <option value="" disabled selected>Extension</option>
                                    <option value="Jr">Jr</option>
                                    <option value="Sr">Sr</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                </select> 
                            </div>

                            <div class="form-group mb-1">
                                <label for="email">E-mail Address </label>
                                <input v-model="form1.email" type="text" name="email"
                                    placeholder="E-mail Address"
                                    class="form-control" :class="{ 'is-invalid': form1.errors.has('email') }">
                                <has-error :form="form1" field="email"></has-error>
                            </div>

                            <div class="form-group mb-1">
                                <label for="date_of_birth">Date of Birth <span class="text-danger">*</span> </label>
                                <input v-model="form1.date_of_birth" type="date" name="date_of_birth"
                                    placeholder="E-mail Address"
                                    class="form-control" :class="{ 'is-invalid': form1.errors.has('date_of_birth') }">
                                <has-error :form="form1" field="date_of_birth"></has-error>
                            </div>

                            <div class="form-group mb-1">
                                <label for="gender">Gender <span class="text-danger">*</span> </label>
                                <select name="gender" v-model="form1.gender" id="gender" placeholder="Select Gender" class="form-control custom-select"
                                    :class="{
                                    'is-invalid': form1.errors.has('gender') }">
                                    <option value="" disabled selected>Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select> 
                            </div>

                            <div class="form-group mb-1">
                                <label for="religion_id">Religion <span class="text-danger">*</span> </label>
                                <select class="form-control"  name="religion_id"  v-model="form1.religion_id" :class="{ 'is-invalid': form1.errors.has('religion_id') }">
                                    <option value="" disabled selected>Religion</option>
                                    <option v-for="religion in religions.data" :key="religion.id" :value="religion.id" selected>{{ religion.religion_name}}</option>
                                    <has-error :form="form1" field="religion_id"></has-error>
                                </select>
                            </div>

                            <div class="form-group mb-1">
                                <label for="psa">Birth Certificate No. </label>
                                <input v-model="form1.psa" type="text" name="psa"
                                    placeholder="Birth Certificate No."
                                    class="form-control" :class="{ 'is-invalid': form1.errors.has('psa') }">
                                <has-error :form="form1" field="psa"></has-error>
                            </div>

                            <div class="form-group mb-1">
                                <label for="indigenous">Do you belong to the Indigenous People (IP) Community/Tribe? <span class="text-danger">*</span> </label>
                                <select name="indigenous" v-model="form1.indigenous" id="indigenous" class="form-control custom-select"
                                    :class="{
                                    'is-invalid': form1.errors.has('indigenous') }">
                                    <option value="" disabled selected>Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select> 
                            </div>
                            
                            <div class="form-group mb-1">
                                <label for="mother_tongue_id">Mother Tongue <span class="text-danger">*</span> </label>
                                <select class="form-control"  name="mother_tongue_id"  v-model="form1.mother_tongue_id" :class="{ 'is-invalid': form1.errors.has('mother_tongue_id') }">
                                    <option value="" disabled selected>Mother Tongue</option>
                                    <option v-for="mother_tongue in mother_tongues.data" :key="mother_tongue.id" :value="mother_tongue.id" selected>{{ mother_tongue.mother_tongue}}</option>
                                    <has-error :form="form1" field="mother_tongue_id"></has-error>
                                </select>
                            </div>

                            <div class="form-group mb-1">
                                <label for="special_educational">Are you a Learner with Special Educational Need (LSEN) or PWD? <span class="text-danger">*</span> </label>
                                <select name="special_educational" v-model="form1.special_educational" id="special_educational" class="form-control custom-select"
                                    :class="{
                                    'is-invalid': form1.errors.has('special_educational') }">
                                    <option value="" disabled selected>Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select> 
                            </div>
                            
                            <div class="form-group mb-1">
                                <label for="specify_lrn">If you answer "Yes" as LSEN/PWD, please specify the category </label>
                                <input v-model="form1.specify_lrn" type="text" name="specify_lrn"
                                    placeholder="Specify LRN"
                                    class="form-control" :class="{ 'is-invalid': form1.errors.has('specify_lrn') }">
                                <has-error :form="form1" field="specify_lrn"></has-error>
                            </div>

                            <div class="form-group mb-1">
                                <label for="region">Region<span class="text-danger">*</span></label>
                                <input v-model="form1.region" type="text" name="region"
                                    placeholder="Specify Region"
                                    class="form-control" :class="{ 'is-invalid': form1.errors.has('region') }">
                                <has-error :form="form1" field="region"></has-error>
                            </div>

                            <div class="form-group mb-1">
                                <label for="province">Province<span class="text-danger">*</span></label>
                                <input v-model="form1.province" type="text" name="province"
                                    placeholder="Specify Province"
                                    class="form-control" :class="{ 'is-invalid': form1.errors.has('province') }">
                                <has-error :form="form1" field="province"></has-error>
                            </div>

                            <div class="form-group mb-1">
                                <label for="city_municipality">City/Municipality<span class="text-danger">*</span></label>
                                <input v-model="form1.city_municipality" type="text" name="city_municipality"
                                    placeholder="Specify City/Municipality"
                                    class="form-control" :class="{ 'is-invalid': form1.errors.has('city_municipality') }">
                                <has-error :form="form1" field="city_municipality"></has-error>
                            </div>

                            <div class="form-group mb-1">
                                <label for="barangay">Barangay<span class="text-danger">*</span></label>
                                <input v-model="form1.barangay" type="text" name="barangay"
                                    placeholder="Specify Barangay"
                                    class="form-control" :class="{ 'is-invalid': form1.errors.has('barangay') }">
                                <has-error :form="form1" field="barangay"></has-error>
                            </div>

                            <div class="form-group mb-1">
                                <label for="house_no_street">House No. and Street<span class="text-danger">*</span></label>
                                <input v-model="form1.house_no_street" type="text" name="house_no_street"
                                    placeholder="Specify House No. and Street"
                                    class="form-control" :class="{ 'is-invalid': form1.errors.has('house_no_street') }">
                                <has-error :form="form1" field="house_no_street"></has-error>
                            </div>
                            <h3> </h3>
                            <h2>Parent/Guardian Information</h2>
                            <div class="form-group mb-1">
                                <label for="father_name">Father's Name<span class="text-danger">*</span></label>
                                <input v-model="form1.father_name" type="text" name="father_name"
                                    placeholder="Enter Father's Name"
                                    class="form-control" :class="{ 'is-invalid': form1.errors.has('father_name') }">
                                <has-error :form="form1" field="father_name"></has-error>
                                <small id="passwordHelpInline" class="text-muted">
                                Last Name, First Name, Middle Name
                                </small>
                            </div>

                            <div class="form-group mb-1">
                                <label for="father_education">Father's Highest Educational Attainment</label>
                                <select name="father_education" v-model="form1.father_education" id="father_education" class="form-control custom-select"
                                    :class="{
                                    'is-invalid': form1.errors.has('father_education') }">
                                    <option value="" disabled selected>Select</option>
                                    <option value="Elementary">Elementary</option>
                                    <option value="High School">High School</option>
                                    <option value="Technical/Vocational">Technical/Vocational</option>
                                    <option value="College Undergraduate">College Undergraduate</option>
                                    <option value="College Graduate">College Graduate</option>
                                    <option value="Master's Degree">Master's Degree</option>
                                    <option value="Doctorate Degree">Doctorate Degree</option>
                                </select> 
                            </div>

                            <div class="form-group mb-1">
                                <label for="father_employment">Father’s Employment Status</label>
                                <input v-model="form1.father_employment" type="text" name="father_employment"
                                    placeholder="Enter Father’s Employment Status"
                                    class="form-control" :class="{ 'is-invalid': form1.errors.has('father_employment') }">
                                <has-error :form="form1" field="father_employment"></has-error>
                            </div>

                            <div class="form-group mb-1">
                                <label for="father_number">Father’s Contact Number</label>
                                <input v-model="form1.father_number" type="text" name="father_number"
                                    placeholder="Enter Father’s Contact Number"
                                    class="form-control" :class="{ 'is-invalid': form1.errors.has('father_number') }">
                                <has-error :form="form1" field="father_number"></has-error>
                            </div>

                            <div class="form-group mb-1">
                                <label for="mother_name">Mother's Name<span class="text-danger">*</span></label>
                                <input v-model="form1.mother_name" type="text" name="mother_name"
                                    placeholder="Enter Mother's Name"
                                    class="form-control" :class="{ 'is-invalid': form1.errors.has('mother_name') }">
                                <has-error :form="form1" field="mother_name"></has-error>
                                <small id="passwordHelpInline" class="text-muted">
                                Last Name, First Name, Middle Name
                                </small>
                            </div>

                            <div class="form-group mb-1">
                                <label for="mother_education">Mother's Highest Educational Attainment</label>
                                <select name="mother_education" v-model="form1.mother_education" id="mother_education" class="form-control custom-select"
                                    :class="{
                                    'is-invalid': form1.errors.has('mother_education') }">
                                    <option value="" disabled selected>Select</option>
                                    <option value="Elementary">Elementary</option>
                                    <option value="High School">High School</option>
                                    <option value="Technical/Vocational">Technical/Vocational</option>
                                    <option value="College Undergraduate">College Undergraduate</option>
                                    <option value="College Graduate">College Graduate</option>
                                    <option value="Master's Degree">Master's Degree</option>
                                    <option value="Doctorate Degree">Doctorate Degree</option>
                                </select> 
                            </div>

                            <div class="form-group mb-1">
                                <label for="mother_employment">Mother’s Employment Status</label>
                                <input v-model="form1.mother_employment" type="text" name="mother_employment"
                                    placeholder="Enter Mother’s Employment Status"
                                    class="form-control" :class="{ 'is-invalid': form1.errors.has('mother_employment') }">
                                <has-error :form="form1" field="mother_employment"></has-error>
                            </div>

                            <div class="form-group mb-1">
                                <label for="mother_number">Mother’s Contact Number</label>
                                <input v-model="form1.mother_number" type="text" name="mother_number"
                                    placeholder="Enter Mother’s Contact Number"
                                    class="form-control" :class="{ 'is-invalid': form1.errors.has('mother_number') }">
                                <has-error :form="form1" field="mother_number"></has-error>
                            </div>

                            <div class="form-group mb-1">
                                <label for="guardian_name">Guardian's Name<span class="text-danger">*</span></label>
                                <input v-model="form1.guardian_name" type="text" name="guardian_name"
                                    placeholder="Enter Guardian's Name"
                                    class="form-control" :class="{ 'is-invalid': form1.errors.has('guardian_name') }">
                                <has-error :form="form1" field="guardian_name"></has-error>
                                <small id="passwordHelpInline" class="text-muted">
                                Last Name, First Name, Middle Name
                                </small>
                            </div>

                            <div class="form-group mb-1">
                                <label for="guardian_education">Guardian's Highest Educational Attainment</label>
                                <select name="guardian_education" v-model="form1.guardian_education" id="guardian_education" class="form-control custom-select"
                                    :class="{
                                    'is-invalid': form1.errors.has('guardian_education') }">
                                    <option value="" disabled selected>Select</option>
                                    <option value="Elementary">Elementary</option>
                                    <option value="High School">High School</option>
                                    <option value="Technical/Vocational">Technical/Vocational</option>
                                    <option value="College Undergraduate">College Undergraduate</option>
                                    <option value="College Graduate">College Graduate</option>
                                    <option value="Master's Degree">Master's Degree</option>
                                    <option value="Doctorate Degree">Doctorate Degree</option>
                                </select> 
                            </div>

                            <div class="form-group mb-1">
                                <label for="guardian_employment">Guardian's Employment Status</label>
                                <input v-model="form1.guardian_employment" type="text" name="guardian_employment"
                                    placeholder="Enter Guardian's Employment Status"
                                    class="form-control" :class="{ 'is-invalid': form1.errors.has('guardian_employment') }">
                                <has-error :form="form1" field="guardian_employment"></has-error>
                            </div>

                            <div class="form-group mb-1">
                                <label for="guardian_number">Guardian's Contact Number</label>
                                <input v-model="form1.guardian_number" type="text" name="guardian_number"
                                    placeholder="Enter Guardian's Contact Number"
                                    class="form-control" :class="{ 'is-invalid': form1.errors.has('guardian_number') }">
                                <has-error :form="form1" field="guardian_number"></has-error>
                            </div>

                            <div class="form-group mb-1">
                                <label for="key_stage">Key Stage<span class="text-danger">*</span></label>
                                <select name="key_stage" v-model="form1.key_stage" id="key_stage" class="form-control custom-select"
                                    :class="{
                                    'is-invalid': form1.errors.has('key_stage') }">
                                    <option value="" disabled selected>Select</option>
                                    <option value="jhs">Junior High School (G7 to G10)</option>
                                    <option value="shs">Senior High School</option>
                                </select> 
                            </div>

                            <div class="form-group mb-1">
                                <label for="jhs_grade_level">If Junior High School, input Grade Level to enrol</label>
                                <select name="jhs_grade_level" v-model="form1.jhs_grade_level" id="jhs_grade_level" class="form-control custom-select"
                                    :class="{
                                    'is-invalid': form1.errors.has('jhs_grade_level') }">
                                    <option value="" disabled selected>Select</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select> 
                            </div>

                            <div class="form-group mb-1">
                                <label for="strand_id">If Senior High School, select STRAND  </label>
                                <select class="form-control"  name="strand_id"  v-model="form1.strand_id" :class="{ 'is-invalid': form1.errors.has('strand_id') }">
                                    <option value="" disabled selected>Select Strand</option>
                                    <option v-for="strand in strands.data" :key="strand.id" :value="strand.id" selected>{{ strand.strand_name}}</option>
                                    <has-error :form="form1" field="strand_id"></has-error>
                                </select>
                            </div>

                            <div class="form-group mb-1">
                                <label for="schoolyear_id">School Year</label>
                                <select class="form-control"  name="schoolyear_id"  v-model="form1.schoolyear_id" :class="{ 'is-invalid': form1.errors.has('schoolyear_id') }">
                                    <!-- <option value="" disabled selected>Select School Year</option> -->
                                    <option v-for="schoolyear in schoolyears.data" :key="schoolyear.id" :value="schoolyear.id" selected>{{ schoolyear.schoolyear}}</option>
                                    <has-error :form="form1" field="schoolyear_id"></has-error>
                                </select>
                            </div>

                            <div class="form-group mb-1">
                                <label for="status">Enrollment Status</label>
                                <select name="status" v-model="form1.status" id="status" class="form-control custom-select"
                                    :class="{
                                    'is-invalid': form1.errors.has('status') }" required>
                                    <option value="" disabled selected>Select</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Approved">Approved</option>
                                </select> 
                            </div>
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close </button>
                            <button v-show="editMode1" type="submit" class="btn btn-primary">Update</button>
                            <button v-show="!editMode1" type="submit" class="btn btn-success">Create</button>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue2Filters from 'vue2-filters'
    export default {
      mixins: [Vue2Filters.mixin],
        data(){
          
            return{
                editMode1: false,
                learner_types:{},
                religions:{},
                mother_tongues: {},
                strands:{},
                schoolyears:{},
                approved_students:{},
                pending_students:{},
                form1: new Form({
                  id: '',
                  learner_type_id: '',
                  lrn: '',
                  last_name: '',
                  first_name: '',
                  middle_name: '',
                  extension: '',
                  email: '',
                  date_of_birth:'',
                  gender:'',
                  religion_id: '',
                  psa:'',
                  indigenous:'',
                  mother_tongue_id:'',
                  special_educational:'',
                  specify_lrn:'',
                  region:'',
                  province:'',
                  house_no_street:'',
                  city_municipality:'',
                  barangay:'',
                  father_name:'',
                  father_education:'',
                  father_employment:'',
                  father_number:'',
                  mother_name:'',
                  mother_education:'',
                  mother_employment:'',
                  mother_number:'',
                  guardian_name:'',
                  guardian_education:'',
                  guardian_employment:'',
                  guardian_number:'',
                  key_stage:'',
                  jhs_grade_level: '',
                  strand_id: '',
                  schoolyear_id: '',
                  requirement:'',
                  status:'',
                }),
            }
        },
        methods:{
            addNewStudent(){
                this.editMode1 = false;
                this.form1.reset();
                $('#addNewStudent').modal('show')
            },

            createStudent(){
                this.$Progress.start();

                this.form1.post('api/approved_student')
                .then(()=>{
                    fire.$emit('AfterCreate');
                    $('#addNewStudent').modal('hide')
                    Swal.fire('Added New Student!', '', 'success')
                    this.$Progress.finish();
                })
                .catch(()=>{
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    })
                    this.$Progress.fail();
                })
            },

            editStudentModal(approved_student){
                this.editMode1 = true;
                this.form1.reset();
                $('#addNewStudent').modal('show')
                this.form1.fill(approved_student);
            },

            updateStudent(){
                this.$Progress.start();
                this.form1.put("api/approved_student/"+this.form1.id)
                .then(()=>{
                    $('#addNewStudent').modal('hide')
                    Swal.fire(
                        'Updated!',
                        'Student Information has been updated.',
                        'success'
                    )
                    this.$Progress.finish();
                    fire.$emit('AfterCreate')
                })
                .catch(()=>{
                    Swal.fire("Failed!", "There was something wrong.", "warning");
                    this.$Progress.fail();
                })
            },

            deleteStudent(id){
                Swal.fire({
                        title: 'Delete Student Information?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value){
                            this.form1.delete('api/approved_student/'+id).then(()=>{
                                    Swal.fire(
                                        'Deleted!',
                                        'Student Information has been deleted.',
                                        'success'
                                    )
                                    fire.$emit('AfterCreate');
                            }).catch(()=>{
                                Swal.fire("Failed!", "There was something wrong.", "warning");
                                this.$Progress.fail();
                            })
                        }
                    })
            },

            getStudentResults_a(page = 1) {

			    axios.get('api/approved_student?page=' + page)
				.then(response => {
					this.approved_students = response.data;
				});
            },

            getStudentResults_p(page = 1) {
			    axios.get('api/pending_student?page=' + page)
				.then(response => {
					this.pending_students = response.data;
				});
            },

            loadLearnerTypes(){
                axios.get("api/learner_type").then(({ data }) => (this.learner_types = data));
            },
            loadReligion(){
                axios.get("api/religion").then(({ data }) => (this.religions = data));
            },
            loadMotherTongue(){
                axios.get("api/mother_tongue").then(({ data }) => (this.mother_tongues = data));
            },
            loadStrand(){
                axios.get("api/strand").then(({ data }) => (this.strands = data));
            },
            loadSchoolyear(){
                axios.get("api/schoolyear").then(({ data }) => (this.schoolyears = data));
            },
            load_students(){
                // axios.get("api/approved_student").then(({ data }) => (this.approved_students = data));
                axios.get("api/approved_student").then(function( response ){
                    this.approved_students = response.data.approved_students;
                    this.pending_students = response.data.pending_students;
                    console.log(this.approved_students.total);
                    console.log(response.data.pending_students);
                }.bind(this));
            },
            // loadPendingStudents(){
            //     axios.get("api/pending_student").then(({ data }) => (this.pending_students = data));
            // },
        },
        created() {
            fire.$on('searching', ()=>{
                let query = this.$parent.search;
                axios.get('api/findLearnerType?q=' + query)
                .then(({data}) => {
                    this.learner_types = data
                })
                .catch(()=>{
                    
                }) 
            })

            this.loadLearnerTypes();
            this.loadReligion();
            this.loadMotherTongue();
            this.loadStrand();
            this.loadSchoolyear();
            // this.loadStudents();
            // this.loadPendingStudents();
            this.load_students();

            fire.$on('AfterCreate', ()=>{
                this.loadLearnerTypes();
                this.loadReligion();
                this.loadMotherTongue();
                this.loadStrand();
                this.loadSchoolyear();
                // this.loadPendingStudents();
                this.load_students();
            });
        }
    }
</script>
