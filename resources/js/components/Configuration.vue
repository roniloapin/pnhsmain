<template>
    <div class="container">
        <h3><strong> Settings</strong></h3>
        <nav class="mt-3">
            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                <a class="nav-item nav-link color-blue active" id="nav-learner-type-tab" data-toggle="tab" href="#nav-learner-type" role="tab" aria-controls="nav-learner-type" aria-selected="true"> <strong>Learner Type</strong> </a>
                <a class="nav-item nav-link color-blue" id="nav-religion-tab" data-toggle="tab" href="#nav-religion" role="tab" aria-controls="nav-religion" aria-selected="true"><strong>Religion</strong> </a>
                <a class="nav-item nav-link color-blue" id="nav-mother-tongue-tab" data-toggle="tab" href="#nav-mother-tongue" role="tab" aria-controls="nav-mother-tongue" aria-selected="true"><strong>Mother Tongue</strong> </a>
                <a class="nav-item nav-link color-blue" id="nav-strand-tab" data-toggle="tab" href="#nav-strand" role="tab" aria-controls="nav-strand" aria-selected="true"><strong>STRAND</strong> </a>
                <a class="nav-item nav-link color-blue" id="nav-schoolyear-tab" data-toggle="tab" href="#nav-schoolyear" role="tab" aria-controls="nav-schoolyear" aria-selected="true"><strong>School Year</strong> </a>
                <a class="nav-item nav-link color-blue" id="nav-subject-tab" data-toggle="tab" href="#nav-subject" role="tab" aria-controls="nav-subject" aria-selected="true"><strong>Subjects</strong> </a>
                <a class="nav-item nav-link color-blue" id="nav-room-tab" data-toggle="tab" href="#nav-room" role="tab" aria-controls="nav-room" aria-selected="true"><strong>Rooms</strong> </a>
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
                                        <tr v-if="learner_types.total == 0">
                                            <td colspan="6" class="text-center"><label>No records yet.</label></td>
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
                                        <tr v-if="religions.total == 0">
                                            <td colspan="6" class="text-center"><label>No records yet.</label></td>
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
                                        <tr v-if="mother_tongues.total == 0">
                                            <td colspan="6" class="text-center"><label>No records yet.</label></td>
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
                                        <tr v-if="strands.total == 0">
                                            <td colspan="6" class="text-center"><label>No records yet.</label></td>
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

            <div class="tab-pane fade show" id="nav-schoolyear" role="tabpanel" aria-labelledby="nav-schoolyear-tab">
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-primary card-outline">
                                <h5 class="m-0 fas text-primary"> School Year</h5>
                                <div class="card-tools">
                                    <button class="btn btn-success btn-block p-1" @click="newSchoolyear" title="Add New School Year">Add New</button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" >
                                <table class="table table-hover" >
                                    <tbody >
                                        <tr style="text-align:center;">
                                            <th>Action</th>
                                            <th>School Year</th>
                                            <th>Status</th>
                                        </tr>
                                        <tr v-if="schoolyears.total == 0">
                                            <td colspan="6" class="text-center"><label>No records yet.</label></td>
                                        </tr>
                                        <tr style="text-align:center;" v-for="schoolyear in schoolyears.data" :key="schoolyear.id" >
                                            <td>
                                                <a href="#" @click="editSchoolyearModal(schoolyear)">
                                                    <i class="fa fa-edit color-blue" title="Edit"></i>
                                                </a>
                                                |
                                                <a href="#" @click="deleteSchoolyear(schoolyear.id)">
                                                    <i class="fa fa-trash-alt color-red" title="Delete"></i>
                                                </a>
                                            </td>
                                            <td>{{schoolyear.schoolyear}}</td>
                                            <td>{{schoolyear.schoolyear_status}}</td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                    <pagination :data="schoolyears" @pagination-change-page="getSchoolyearResults">
                                        <span slot="prev-nav">&lt; Previous</span>
                                        <span slot="next-nav">Next &gt;</span>
                                    </pagination>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>

            <div class="tab-pane fade show" id="nav-subject" role="tabpanel" aria-labelledby="nav-subject-tab">
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-primary card-outline">
                                <h5 class="m-0 fas text-primary"> Subjects</h5>
                                <div class="card-tools">
                                    <button class="btn btn-success btn-block p-1" @click="newSubject" title="Add New Subject">Add New</button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" >
                                <table class="table table-hover" >
                                    <tbody >
                                        <tr style="text-align:center;">
                                            <th>Action</th>
                                            <th>Subject Name</th>
                                            <th>Subject Code</th>
                                        </tr>
                                        <tr v-if="subjects.total == 0">
                                            <td colspan="6" class="text-center"><label>No records yet.</label></td>
                                        </tr>
                                        <tr style="text-align:center;" v-for="subject in subjects.data" :key="subject.id" >
                                            <td>
                                                <a href="#" @click="editSubjectModal(subject)">
                                                    <i class="fa fa-edit color-blue" title="Edit"></i>
                                                </a>
                                                |
                                                <a href="#" @click="deleteSubject(subject.id)">
                                                    <i class="fa fa-trash-alt color-red" title="Delete"></i>
                                                </a>
                                            </td>
                                            <td>{{subject.subject}}</td>
                                            <td>{{subject.subject_code}}</td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                    <pagination :data="subjects" @pagination-change-page="getSubjectResults">
                                        <span slot="prev-nav">&lt; Previous</span>
                                        <span slot="next-nav">Next &gt;</span>
                                    </pagination>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>

            <div class="tab-pane fade show" id="nav-room" role="tabpanel" aria-labelledby="nav-room-tab">
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-primary card-outline">
                                <h5 class="m-0 fas text-primary"> Rooms</h5>
                                <div class="card-tools">
                                    <button class="btn btn-success btn-block p-1" @click="newRoom" title="Add New Room">Add New</button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" >
                                <table class="table table-hover" >
                                    <tbody >
                                        <tr style="text-align:center;">
                                            <th>Action</th>
                                            <th>Room Name</th>
                                            <th>Room Number</th>
                                        </tr>
                                        <tr v-if="rooms.total == 0">
                                            <td colspan="6" class="text-center"><label>No records yet.</label></td>
                                        </tr>
                                        <tr style="text-align:center;" v-for="room in rooms.data" :key="room.id" >
                                            <td>
                                                <a href="#" @click="editRoomModal(room)">
                                                    <i class="fa fa-edit color-blue" title="Edit"></i>
                                                </a>
                                                |
                                                <a href="#" @click="deleteRoom(room.id)">
                                                    <i class="fa fa-trash-alt color-red" title="Delete"></i>
                                                </a>
                                            </td>
                                            <td >{{room.room}}</td>
                                            <td>{{room.room_number}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                    <pagination :data="rooms" @pagination-change-page="getRoomResults">
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
    <!-- 5. School Year Modal -->
        <div class="modal fade" id="addNewSchoolyear" tabindex="-1" role="dialog" aria-labelledby="addNewSchoolyearTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editMode5" id="addNewSchoolyearTitle"> Add</h5>
                        <h5 class="modal-title" v-show="editMode5" id="addNewSchoolyearTitle"> Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form @submit.prevent="editMode5 ? updateSchoolyear() : createSchoolyear()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form5.schoolyear" type="text" name="schoolyear"
                                    placeholder="Enter School Year"
                                    class="form-control" :class="{ 'is-invalid': form5.errors.has('schoolyear') }">
                                <has-error :form="form5" field="schoolyear"></has-error>
                            </div>
                        </div>

                        <!-- <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form5.schoolyear_status" type="text" name="schoolyear_status"
                                    placeholder="Status"
                                    class="form-control" :class="{ 'is-invalid': form5.errors.has('schoolyear_status') }">
                                <has-error :form="form5" field="schoolyear_status"></has-error>
                            </div>
                        </div> -->

                        <div class="modal-body">
                            <div class="form-group">
                                <select name="schoolyear_status" v-model="form5.schoolyear_status" id="schoolyear_status" class="form-control custom-select"
                                        :class="{
                                        'is-invalid': form5.errors.has('schoolyear_status') }">
                                    <option value="" disabled>Select Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                                <has-error :form="form5" field="schoolyear_status"></has-error>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close </button>
                            <button v-show="editMode5" type="submit" class="btn btn-primary">Update</button>
                            <button v-show="!editMode5" type="submit" class="btn btn-success">Create</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>

    <!-- 6. Subject Modal -->
        <div class="modal fade" id="addNewSubject" tabindex="-1" role="dialog" aria-labelledby="addNewSubjectTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editMode6" id="addNewSubjectTitle"> Add</h5>
                        <h5 class="modal-title" v-show="editMode6" id="addNewSubjectTitle"> Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form @submit.prevent="editMode6 ? updateSubject() : createSubject()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form6.subject" type="text" name="subject"
                                    placeholder="Enter Subject Name"
                                    class="form-control" :class="{ 'is-invalid': form6.errors.has('subject') }">
                                <has-error :form="form6" field="subject"></has-error>
                            </div>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form6.subject_code" type="text" name="subject_code"
                                    placeholder="Enter Subject Code"
                                    class="form-control" :class="{ 'is-invalid': form6.errors.has('subject_code') }">
                                <has-error :form="form6" field="subject_code"></has-error>
                            </div>
                        </div>
                        

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close </button>
                            <button v-show="editMode6" type="submit" class="btn btn-primary">Update</button>
                            <button v-show="!editMode6" type="submit" class="btn btn-success">Create</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>

    <!-- 7. Room Modal -->
        <div class="modal fade" id="addNewRoom" tabindex="-1" role="dialog" aria-labelledby="addNewRoomTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editMode7" id="addNewRoomTitle"> Add</h5>
                        <h5 class="modal-title" v-show="editMode7" id="addNewRoomTitle"> Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form @submit.prevent="editMode7 ? updateRoom() : createRoom()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form7.room" type="text" name="room"
                                    placeholder="Enter Room Name"
                                    class="form-control" :class="{ 'is-invalid': form7.errors.has('room') }">
                                <has-error :form="form7" field="room"></has-error>
                            </div>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form7.room_number" type="text" name="room_number"
                                    placeholder="Enter Room Number"
                                    class="form-control" :class="{ 'is-invalid': form7.errors.has('room_number') }">
                                <has-error :form="form7" field="room_number"></has-error>
                            </div>
                        </div>
                        

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close </button>
                            <button v-show="editMode7" type="submit" class="btn btn-primary">Update</button>
                            <button v-show="!editMode7" type="submit" class="btn btn-success">Create</button>
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
                editMode5: false,
                editMode6: false,
                editMode7: false,
                learner_types:{},
                religions:{},
                mother_tongues: {},
                strands:{},
                schoolyears:{},
                subjects:{},
                rooms:{},
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
                form5: new Form({
                    id: '',
                    schoolyear: '',
                    schoolyear_status: '',
                }),
                form6: new Form({
                    id: '',
                    subject: '',
                    subject_code: '',
                }),
                form7: new Form({
                    id: '',
                    room: '',
                    room_number: '',
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
            newSubject(){
                this.editMode6 = false;
                this.form6.reset();
                $('#addNewSubject').modal('show')
            },
            newRoom(){
                this.editMode7 = false;
                this.form7.reset();
                $('#addNewRoom').modal('show')
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
            createSubject(){
                this.$Progress.start();

                this.form6.post('api/subject')
                .then(()=>{
                    fire.$emit('AfterCreate');
                    $('#addNewSubject').modal('hide')
                    Swal.fire('Added Subject!', '', 'success')
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
            createRoom(){
                this.$Progress.start();

                this.form7.post('api/room')
                .then(()=>{
                    fire.$emit('AfterCreate');
                    $('#addNewRoom').modal('hide')
                    Swal.fire('Added Room!', '', 'success')
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
            editSubjectModal(subject){
                this.editMode6 = true;
                this.form6.reset();
                $('#addNewSubject').modal('show')
                this.form6.fill(subject);
            },
            editRoomModal(room){
                this.editMode7 = true;
                this.form7.reset();
                $('#addNewRoom').modal('show')
                this.form7.fill(room);
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
            updateSubject(){
                this.$Progress.start();
                this.form6.put("api/subject/"+this.form6.id)
                .then(()=>{
                    $('#addNewSubject').modal('hide')
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
            updateRoom(){
                this.$Progress.start();
                this.form7.put("api/room/"+this.form7.id)
                .then(()=>{
                    $('#addNewRoom').modal('hide')
                    Swal.fire(
                        'Updated!',
                        'Room has been updated.',
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
            deleteSubject(id){
                Swal.fire({
                        title: 'Delete Subject?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value){
                            this.form6.delete('api/subject/'+id).then(()=>{
                                    Swal.fire(
                                        'Deleted!',
                                        'Subject has been deleted.',
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
            deleteRoom(id){
                Swal.fire({
                        title: 'Delete Room?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value){
                            this.form7.delete('api/room/'+id).then(()=>{
                                    Swal.fire(
                                        'Deleted!',
                                        'Room has been deleted.',
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
            getSubjectResults(page = 1) {
			    axios.get('api/subject?page=' + page)
				.then(response => {
					this.subjects = response.data;
				});
            },
            getRoomResults(page = 1) {
			    axios.get('api/room?page=' + page)
				.then(response => {
					this.rooms = response.data;
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
            loadSubject(){
                axios.get("api/subject").then(({ data }) => (this.subjects = data));
            },
            loadRoom(){
                axios.get("api/room").then(({ data }) => (this.rooms = data));
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
            fire.$on('searching', ()=>{
                let query = this.$parent.search;
                axios.get('api/findSchoolyear?w=' + query)
                .then(({data}) => {
                    this.schoolyears = data
                })
                .catch(()=>{
                    
                }) 
            })
            fire.$on('searching', ()=>{
                let query = this.$parent.search;
                axios.get('api/findSubject?x=' + query)
                .then(({data}) => {
                    this.subjects = data
                })
                .catch(()=>{
                    
                }) 
            })
            fire.$on('searching', ()=>{
                let query = this.$parent.search;
                axios.get('api/findRoom?y=' + query)
                .then(({data}) => {
                    this.rooms = data
                })
                .catch(()=>{
                    
                }) 
            })



            this.loadLearnerTypes();
            this.loadReligion();
            this.loadMotherTongue();
            this.loadStrand();
            this.loadSchoolyear();
            this.loadSubject();
            this.loadRoom();

            fire.$on('AfterCreate', ()=>{
                this.loadLearnerTypes();
                this.loadReligion();
                this.loadMotherTongue();
                this.loadStrand();
                this.loadSchoolyear();
                this.loadSubject();
                this.loadRoom();
            });
        }
    }
</script>
