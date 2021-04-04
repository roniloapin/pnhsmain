<template>
    <div class="container">
        <nav class="mt-3">
            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                <a class="nav-item nav-link color-blue active" id="nav-learner-type-tab" data-toggle="tab" href="#nav-learner-type" role="tab" aria-controls="nav-learner-type" aria-selected="true"> <strong>Learner Type</strong> </a>
                <a class="nav-item nav-link color-blue" id="nav-religion-tab" data-toggle="tab" href="#nav-religion" role="tab" aria-controls="nav-religion" aria-selected="true"><strong>Religion</strong> </a>
                <a class="nav-item nav-link color-blue" id="nav-mother-tongue-tab" data-toggle="tab" href="#nav-mother-tongue" role="tab" aria-controls="nav-mother-tongue" aria-selected="true"><strong>Mother Tongue</strong> </a>
                <a class="nav-item nav-link color-blue" id="nav-strand-tab" data-toggle="tab" href="#nav-strand" role="tab" aria-controls="nav-strand" aria-selected="true"><strong>STRAND</strong> </a>
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-learner-type" role="tabpanel" aria-labelledby="nav-learner-tab">
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-primary card-outline">
                                <h5 class="m-0 fas text-primary"> Type of Learner</h5>
                                <div class="card-tools">
                                    <button class="btn btn-success btn-block p-1" @click="newLearnerType" title="Add New Learner Type">Add New</button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" >
                                <table class="table table-hover" >
                                    <tbody >
                                        <tr style="text-align:center;">
                                            <th>Action</th>
                                            <th>Learner Type</th>
                                            <th>Learner Type Code</th>
                                        </tr>
                                        <tr style="text-align:center;" v-for="learner_type in learner_types.data" :key="learner_type.id" >
                                            <td>
                                                <a href="#" @click="editLearnerTypeModal(learner_type)">
                                                    <i class="fa fa-edit color-blue" title="Edit"></i>
                                                </a>
                                                |
                                                <a href="#" @click="deleteLearnerType(learner_type.id)">
                                                    <i class="fa fa-trash-alt color-red" title="Delete"></i>
                                                </a>
                                            </td>
                                            <td>{{learner_type.learner_type}}</td>
                                            <td>{{learner_type.learner_type_code}}</td>
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

            <div class="tab-pane fade show" id="nav-religion" role="tabpanel" aria-labelledby="nav-religion-tab">
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

            <div class="tab-pane fade show" id="nav-mother-tongue" role="tabpanel" aria-labelledby="nav-mother-tongue-tab">
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-primary card-outline">
                                <h5 class="m-0 fas text-primary"> Mother Tongue</h5>
                                <div class="card-tools">
                                    <button class="btn btn-success btn-block p-1" @click="newMotherTongue" title="Add New Mother Tongue">Add New</button>
                                 </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" >
                                <table class="table table-hover" >
                                    <tbody >
                                        <tr style="text-align:center;">
                                            <th>Action</th>
                                            <th>Mother Tongue</th>
                                            <th>Mother Tongue Code</th>
                                            
                                        </tr>
                                        <tr style="text-align:center;" v-for="mother_tongue in mother_tongues.data" :key="mother_tongue.id" >
                                            <td>
                                                <a href="#" @click="editMotherTongueModal(mother_tongue)">
                                                    <i class="fa fa-edit color-blue" title="Edit"></i>
                                                </a>
                                                |
                                                <a href="#" @click="deleteMotherTongue(mother_tongue.id)">
                                                    <i class="fa fa-trash-alt color-red" title="Delete"></i>
                                                </a>
                                            </td>
                                            <td>{{mother_tongue.mother_tongue}}</td>
                                            <td>{{mother_tongue.mother_tongue_code}}</td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                    <pagination :data="mother_tongues" @pagination-change-page="getMotherTongueResults">
                                        <span slot="prev-nav">&lt; Previous</span>
                                        <span slot="next-nav">Next &gt;</span>
                                    </pagination>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>

            <div class="tab-pane fade show" id="nav-strand" role="tabpanel" aria-labelledby="nav-strand-tab">
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-primary card-outline">
                                <h5 class="m-0 fas text-primary"> STRAND Categories</h5>
                                <div class="card-tools">
                                    <button class="btn btn-success btn-block p-1" @click="newStrand" title="Add New STRAND">Add New</button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" >
                                <table class="table table-hover" >
                                    <tbody >
                                        <tr style="text-align:center;">
                                            <th>Action</th>
                                            <th>STRAND Name</th>
                                            <th>STRAND Code</th>
                                        </tr>
                                        <tr style="text-align:center;" v-for="strand in strands.data" :key="strand.id" >
                                            <td>
                                                <a href="#" @click="editStrandModal(strand)">
                                                    <i class="fa fa-edit color-blue" title="Edit"></i>
                                                </a>
                                                |
                                                <a href="#" @click="deleteStrand(strand.id)">
                                                    <i class="fa fa-trash-alt color-red" title="Delete"></i>
                                                </a>
                                            </td>
                                            <td>{{strand.strand_name}}</td>
                                            <td>{{strand.strand_code}}</td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                    <pagination :data="strands" @pagination-change-page="getStrandResults">
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
    <!-- 2. Religion Modal -->
        <div class="modal fade" id="addNewReligion" tabindex="-1" role="dialog" aria-labelledby="addNewReligionTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editMode2" id="addNewReligionTitle"> Add</h5>
                        <h5 class="modal-title" v-show="editMode2" id="addNewReligionTitle"> Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form @submit.prevent="editMode2 ? updateReligion() : createReligion()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form2.religion_name" type="text" name="religion_name"
                                    placeholder="Religion Name*"
                                    class="form-control" :class="{ 'is-invalid': form2.errors.has('religion_name') }">
                                <has-error :form="form2" field="religion_name"></has-error>
                            </div>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form2.religion_code" type="text" name="religion_code"
                                    placeholder="Religion Code"
                                    class="form-control" :class="{ 'is-invalid': form2.errors.has('religion_code') }">
                                <has-error :form="form2" field="religion_code"></has-error>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close </button>
                            <button v-show="editMode2" type="submit" class="btn btn-primary">Update</button>
                            <button v-show="!editMode2" type="submit" class="btn btn-success">Create</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    <!-- 3. Mother Tongue Modal -->
        <div class="modal fade" id="addNewMotherTongue" tabindex="-1" role="dialog" aria-labelledby="addNewMotherTongueTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editMode3" id="addNewMotherTongueTitle"> Add</h5>
                        <h5 class="modal-title" v-show="editMode3" id="addNewMotherTongueTitle"> Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form @submit.prevent="editMode3 ? updateMotherTongue() : createMotherTongue()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form3.mother_tongue" type="text" name="mother_tongue"
                                    placeholder="Mother Tongue*"
                                    class="form-control" :class="{ 'is-invalid': form3.errors.has('mother_tongue') }">
                                <has-error :form="form3" field="mother_tongue"></has-error>
                            </div>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form3.mother_tongue_code" type="text" name="mother_tongue_code"
                                    placeholder="Mother Tongue Code"
                                    class="form-control" :class="{ 'is-invalid': form3.errors.has('mother_tongue_code') }">
                                <has-error :form="form3" field="mother_tongue_code"></has-error>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close </button>
                            <button v-show="editMode3" type="submit" class="btn btn-primary">Update</button>
                            <button v-show="!editMode3" type="submit" class="btn btn-success">Create</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    <!-- 4. STRAND Modal -->
        <div class="modal fade" id="addNewStrand" tabindex="-1" role="dialog" aria-labelledby="addNewStrandTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editMode4" id="addNewStrandTitle"> Add</h5>
                        <h5 class="modal-title" v-show="editMode4" id="addNewStrandTitle"> Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form @submit.prevent="editMode4 ? updateStrand() : createStrand()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form4.strand_name" type="text" name="strand_name"
                                    placeholder="STRAND Name*"
                                    class="form-control" :class="{ 'is-invalid': form4.errors.has('strand_name') }">
                                <has-error :form="form4" field="strand_name"></has-error>
                            </div>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form4.strand_code" type="text" name="strand_code"
                                    placeholder="STRAND Code"
                                    class="form-control" :class="{ 'is-invalid': form4.errors.has('strand_code') }">
                                <has-error :form="form4" field="strand_code"></has-error>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close </button>
                            <button v-show="editMode4" type="submit" class="btn btn-primary">Update</button>
                            <button v-show="!editMode4" type="submit" class="btn btn-success">Create</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data(){
            return{
                editMode1: false,
                editMode2: false,
                editMode3: false,
                editMode4: false,
                learner_types:{},
                religions:{},
                mother_tongues: {},
                strands:{},
                form1: new Form({
                    id: '',
                    learner_type: '',
                    learner_type_code: '',
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

            fire.$on('AfterCreate', ()=>{
                this.loadLearnerTypes();
                this.loadReligion();
                this.loadMotherTongue();
                this.loadStrand();
            });
        }
    }
</script>
