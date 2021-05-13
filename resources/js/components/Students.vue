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
                                <h5 class="m-0 fas text-primary"> Aproved Students</h5>
                                <div class="card-tools">
                                    <button class="btn btn-success btn-block p-1" @click="newLearnerType" title="Add New Learner Type">Add New</button>
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
                                      <th>E-mail</th>
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
                                        <a href="#" @click="editModal(student)">
                                            <i class="fa fa-edit color-blue" title="Edit"></i>
                                        </a>
                                        |
                                        <a href="#" @click="deleteUser(student.id)">
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
                                    <pagination :data="learner_types" @pagination-change-page="getLearnerTypeResults">
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
                                <h5 class="m-0 fas text-primary"> Religion</h5>
                                <div class="card-tools">
                                    <button class="btn btn-success btn-block p-1" @click="newReligion" title="Add New Religion">Add New</button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" >
                                <table class="table table-hover" >
                                    <tbody >
                                        <tr style="text-align:center;">
                                            <th>Action</th>
                                            <th>Religion</th>
                                            <th>Religion Code</th>
                                            
                                        </tr>
                                        <tr v-if="religions.total == 0">
                                            <td colspan="3" class="text-center"><label>No records yet.</label></td>
                                        </tr>
                                        <tr style="text-align:center;" v-for="religion in religions.data" :key="religion.id" >
                                            <td>
                                                <a href="#" @click="editReligionModal(religion)">
                                                    <i class="fa fa-edit color-blue" title="Edit"></i>
                                                </a>
                                                |
                                                <a href="#" @click="deleteReligion(religion.id)">
                                                    <i class="fa fa-trash-alt color-red" title="Delete"></i>
                                                </a>
                                            </td>
                                            <td>{{religion.religion_name}}</td>
                                            <td>{{religion.religion_code}}</td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                    <pagination :data="religions" @pagination-change-page="getReligionResults">
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
        <div class="modal fade" id="addNewLearnerType" tabindex="-1" role="dialog" aria-labelledby="addNewLearnerTypeTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editMode1" id="addNewLearnerTypeTitle"> Add</h5>
                            <h5 class="modal-title" v-show="editMode1" id="addNewLearnerTypeTitle"> Update</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form @submit.prevent="editMode1 ? updateLearnerType() : createLearnerType()">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input v-model="form1.learner_type" type="text" name="learner_type"
                                        placeholder="Learner Type*"
                                        class="form-control" :class="{ 'is-invalid': form1.errors.has('learner_type') }">
                                    <has-error :form="form1" field="learner_type"></has-error>
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
                form2: new Form({
                    id: '',
                    religion_name: '',
                    religion_code: '',
                }),
                form3: new Form({
                    id: '',
                    mother_tongue: '',
                    mother_tongue_code: '',
                }),
                form4: new Form({
                    id: '',
                    strand_name: '',
                    strand_code: '',
                }),
                form5: new Form({
                    id: '',
                    schoolyear: '',
                    schoolyear_status: '',
                }),
            }
        },
        methods:{
            newLearnerType(){
                this.editMode1 = false;
                this.form1.reset();
                $('#addNewLearnerType').modal('show')
            },
            newReligion(){
                this.editMode2 = false;
                this.form2.reset();
                $('#addNewReligion').modal('show')
            },
            newMotherTongue(){
                this.editMode3 = false;
                this.form3.reset();
                $('#addNewMotherTongue').modal('show')
            },
            newStrand(){
                this.editMode4 = false;
                this.form4.reset();
                $('#addNewStrand').modal('show')
            },
            newSchoolyear(){
                this.editMode5 = false;
                this.form5.reset();
                $('#addNewSchoolyear').modal('show')
            },

            createLearnerType(){
                this.$Progress.start();

                this.form1.post('api/learner_type')
                .then(()=>{
                    fire.$emit('AfterCreate');
                    $('#addNewLearnerType').modal('hide')
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
            createReligion(){
                this.$Progress.start();

                this.form2.post('api/religion')
                .then(()=>{
                    fire.$emit('AfterCreate');
                    $('#addNewReligion').modal('hide')
                    Swal.fire('Added New Religion!', '', 'success')
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
            createMotherTongue(){
                this.$Progress.start();

                this.form3.post('api/mother_tongue')
                .then(()=>{
                    fire.$emit('AfterCreate');
                    $('#addNewMotherTongue').modal('hide')
                    Swal.fire('Added New Mother Tongue!', '', 'success')
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
            createStrand(){
                this.$Progress.start();

                this.form4.post('api/strand')
                .then(()=>{
                    fire.$emit('AfterCreate');
                    $('#addNewStrand').modal('hide')
                    Swal.fire('Added STRAND Category!', '', 'success')
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
            createSchoolyear(){
                this.$Progress.start();

                this.form5.post('api/schoolyear')
                .then(()=>{
                    fire.$emit('AfterCreate');
                    $('#addNewSchoolyear').modal('hide')
                    Swal.fire('Added School Year!', '', 'success')
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

            editLearnerTypeModal(learner_type){
                this.editMode1 = true;
                this.form1.reset();
                $('#addNewLearnerType').modal('show')
                this.form1.fill(learner_type);
            },
            editReligionModal(religion){
                this.editMode2 = true;
                this.form2.reset();
                $('#addNewReligion').modal('show')
                this.form2.fill(religion);
            },
            editMotherTongueModal(mother_tongue){
                this.editMode3 = true;
                this.form3.reset();
                $('#addNewMotherTongue').modal('show')
                this.form3.fill(mother_tongue);
            },
            editStrandModal(strand){
                this.editMode4 = true;
                this.form4.reset();
                $('#addNewStrand').modal('show')
                this.form4.fill(strand);
            },
            editSchoolyearModal(schoolyear){
                this.editMode5 = true;
                this.form5.reset();
                $('#addNewSchoolyear').modal('show')
                this.form5.fill(schoolyear);
            },

            updateLearnerType(){
                this.$Progress.start();
                this.form1.put("api/learner_type/"+this.form1.id)
                .then(()=>{
                    $('#addNewLearnerType').modal('hide')
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
            updateReligion(){
                this.$Progress.start();
                this.form2.put("api/religion/"+this.form2.id)
                .then(()=>{
                    $('#addNewReligion').modal('hide')
                    Swal.fire(
                        'Updated!',
                        'Religion has been updated.',
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
            updateMotherTongue(){
                this.$Progress.start();
                this.form3.put("api/mother_tongue/"+this.form3.id)
                .then(()=>{
                    $('#addNewMotherTongue').modal('hide')
                    Swal.fire(
                        'Updated!',
                        'Mother Tongue has been updated.',
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
            updateStrand(){
                this.$Progress.start();
                this.form4.put("api/strand/"+this.form4.id)
                .then(()=>{
                    $('#addNewStrand').modal('hide')
                    Swal.fire(
                        'Updated!',
                        'STRAND Name has been updated.',
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
            updateSchoolyear(){
                this.$Progress.start();
                this.form5.put("api/schoolyear/"+this.form5.id)
                .then(()=>{
                    $('#addNewSchoolyear').modal('hide')
                    Swal.fire(
                        'Updated!',
                        'School Year has been updated.',
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

            deleteLearnerType(id){
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
            deleteReligion(id){
                Swal.fire({
                        title: 'Delete Religion?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value){
                            this.form2.delete('api/religion/'+id).then(()=>{
                                    Swal.fire(
                                        'Deleted!',
                                        'Religion has been deleted.',
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
            deleteMotherTongue(id){
                Swal.fire({
                        title: 'Delete Mother Tongue?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value){
                            this.form3.delete('api/mother_tongue/'+id).then(()=>{
                                    Swal.fire(
                                        'Deleted!',
                                        'Mother Tongue has been deleted.',
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
            deleteStrand(id){
                Swal.fire({
                        title: 'Delete STRAND Category?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value){
                            this.form4.delete('api/strand/'+id).then(()=>{
                                    Swal.fire(
                                        'Deleted!',
                                        'STRAND Category has been deleted.',
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
            deleteSchoolyear(id){
                Swal.fire({
                        title: 'Delete School Year?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value){
                            this.form5.delete('api/schoolyear/'+id).then(()=>{
                                    Swal.fire(
                                        'Deleted!',
                                        'School Year has been deleted.',
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

            getLearnerTypeResults(page = 1) {
			    axios.get('api/learner_type?page=' + page)
				.then(response => {
					this.learner_types = response.data;
				});
            },
            getReligionResults(page = 1) {
			    axios.get('api/religion?page=' + page)
				.then(response => {
					this.religions = response.data;
				});
            },
            getMotherTongueResults(page = 1) {
			    axios.get('api/mother_tongue?page=' + page)
				.then(response => {
					this.mother_tongues = response.data;
				});
            },
            getStrandResults(page = 1) {
			    axios.get('api/strand?page=' + page)
				.then(response => {
					this.strands = response.data;
				});
            },
            getSchoolyearResults(page = 1) {
			    axios.get('api/schoolyear?page=' + page)
				.then(response => {
					this.schoolyears = response.data;
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
            fire.$on('searching', ()=>{
                let query = this.$parent.search;
                axios.get('api/findReligion?r=' + query)
                .then(({data}) => {
                    this.religions = data
                })
                .catch(()=>{
                    
                }) 
            })
            fire.$on('searching', ()=>{
                let query = this.$parent.search;
                axios.get('api/findMotherTongue?s=' + query)
                .then(({data}) => {
                    this.mother_tongues = data
                })
                .catch(()=>{
                    
                }) 
            })
            fire.$on('searching', ()=>{
                let query = this.$parent.search;
                axios.get('api/findStrand?t=' + query)
                .then(({data}) => {
                    this.strands = data
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
