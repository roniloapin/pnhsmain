<template>
    <div class="container">
        <nav class="mt-3">
            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                <a class="nav-item nav-link color-blue active" id="nav-student-approved-type-tab" data-toggle="tab" href="#nav-student-approved-type" role="tab" aria-controls="nav-student-approved-type" aria-selected="true"> <strong>Approved Students</strong> </a>
                <a class="nav-item nav-link color-blue" id="nav-student-pending-tab" data-toggle="tab" href="#nav-student-pending" role="tab" aria-controls="nav-student-pending" aria-selected="true"><strong>Pending Students</strong> </a>
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
                                      </td>
                                      <td>{{student.id}}</td>
                                      <td style="text-align:left;">{{student.last_name}},&nbsp;{{student.first_name}}&nbsp;{{student.middle_name}}</td>
                                      <td><span class="tag tag-success">{{student.email}}</span></td>
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
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editMode1" id="addNewStudentTitle"> Add</h5>
                            <h5 class="modal-title" v-show="editMode1" id="addNewStudentTitle"> Update</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form @submit.prevent="editMode1 ? updateStudent() : createStudent()">
                            <div class="modal-body">
                                <div class="form-group">
                                    <select class="form-control"  name="learner_type_id"  v-model="form1.learner_type_id" :class="{ 'is-invalid': form.errors.has('learner_type_id') }">
                                        <option value="" disabled selected>Select Learner Type</option>
                                        <option v-for="learner_type in learner_types.data" :key="learner_type.id" :value="learner_type.id" selected>{{ learner_type.learner_type}}</option>
                                        <has-error :form="form" field="unit"></has-error>
                                    </select>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <input v-model="form1.learner_type_code" type="text" name="_code"
                                        placeholder="Learner Type Code"
                                        class="form-control" :class="{ 'is-invalid': form1.errors.has('_code') }">
                                    <has-error :form="form1" field="_code"></has-error>
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
                  shs_strand_id: '',
                  school_year: '',
                  picture:'',
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

                this.form1.post('api/learner_type')
                .then(()=>{
                    fire.$emit('AfterCreate');
                    $('#addNewStudent').modal('hide')
                    Swal.fire('Added New Learner Type!', '', 'success')
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

            editStudentModal(learner_type){
                this.editMode1 = true;
                this.form1.reset();
                $('#addNewStudent').modal('show')
                this.form1.fill(learner_type);
            },

            updateStudent(){
                this.$Progress.start();
                this.form1.put("api/learner_type/"+this.form1.id)
                .then(()=>{
                    $('#addNewStudent').modal('hide')
                    Swal.fire(
                        'Updated!',
                        'Learner Type has been updated.',
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
                        title: 'Delete Learner Type?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value){
                            this.form1.delete('api/learner_type/'+id).then(()=>{
                                    Swal.fire(
                                        'Deleted!',
                                        'Learner Type has been deleted.',
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

			    axios.get('api/learner_type?page=' + page)
				.then(response => {
					this.learner_types = response.data;
				});
            },

            getStudentResults_p(page = 1) {
			    axios.get('api/learner_type?page=' + page)
				.then(response => {
					this.learner_types = response.data;
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
