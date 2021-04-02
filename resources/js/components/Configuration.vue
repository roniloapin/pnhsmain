<template>
    <div class="container">
        <nav class="mt-3">
            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                <a class="nav-item nav-link color-blue active" id="nav-learner-type-tab" data-toggle="tab" href="#nav-learner-type" role="tab" aria-controls="nav-learner-type" aria-selected="true"> <strong>Learner Type</strong> </a>
                <a class="nav-item nav-link color-green" id="nav-religion-tab" data-toggle="tab" href="#nav-religion" role="tab" aria-controls="nav-religion" aria-selected="true"><strong>Model</strong> </a>
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-learner-type" role="tabpanel" aria-labelledby="nav-learner-type-tab">
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
                                            <th>Learner Type</th>
                                            <th>Learner Type Code</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr style="text-align:center;" v-for="learner_type in learner_types.data" :key="learner_type.id" >
                                            <td>{{learner_type.learner_type}}</td>
                                            <td>{{learner_type.learner_type_code}}</td>
                                            <td>
                                                <a href="#" @click="editLearnerTypeModal(learner_type)">
                                                    <i class="fa fa-edit color-blue" title="Edit"></i>
                                                </a>
                                                |
                                                <a href="#" @click="deleteLearnerType(learner_type.id)">
                                                    <i class="fa fa-trash-alt color-red" title="Delete"></i>
                                                </a>
                                            </td>
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
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="fas fa-times-circle"></i></button>
                                <button v-show="editMode1" type="submit" class="btn btn-primary">Update <i class="fas fa-laptop"></i></button>
                                <button v-show="!editMode1" type="submit" class="btn btn-success">Create <i class="fas fa-laptop"></i></button>
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
                learner_types:{},
                form1: new Form({
                    id: '',
                    learner_type: '',
                    learner_type_code: '',
                }),
            }
        },
        methods:{
            newLearnerType(){
                this.editMode1 = false;
                this.form1.reset();
                $('#addNewLearnerType').modal('show')
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

            editLearnerTypeModal(learner_type){
                this.editMode1 = true;
                this.form1.reset();
                $('#addNewLearnerType').modal('show')
                this.form1.fill(learner_type);
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

            deleteLearnerType(id){
                Swal.fire({
                        title: 'Delete LearnerType?',
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

            getLearnerTypeResults(page = 1) {
			    axios.get('api/learner_type?page=' + page)
				.then(response => {
					this.learner_types = response.data;
				});
            },

            loadLearnerTypes(){
                axios.get("api/learner_type").then(({ data }) => (this.learner_types = data));
            },
        },
        created() {
            fire.$on('searching', ()=>{
                let query = this.$parent.search;
                axios.get('api/findLearnerType?q=' + query)
                .then(({data}) => {
                    this.learner_types = data.data
                })
                .catch(()=>{
                    
                }) 
            })
            this.loadLearnerTypes();
            fire.$on('AfterCreate', ()=>{
                this.loadLearnerTypes();
            });
        }
    }
</script>
