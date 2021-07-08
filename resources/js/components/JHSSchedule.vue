<template>
    <div class="container">
         <h3><strong> Class Schedule</strong></h3>
        <div class="row" v-if="$gate.isTeacherOrAdmin()">
          <div class="col-md-12" >
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">JHS Schedule</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-success" @click="newModal" v-if="$gate.isAdmin()">Add Schedule</button>
                </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-head-fixed table-hover">
                  <thead>
                    <tr style="text-align:center;">
                        <th v-if="$gate.isAdmin()">Action</th>
                        <th>Grade Level</th>
                        <th>Subject</th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Room</th>
                        <th>Teacher</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-if="schedules.total == 0">
                        <td colspan="6" class="text-center"><label>No records yet.</label></td>
                    </tr>
                    <tr style="text-align:center;" v-for="schedule in schedules.data" :key="schedule.id">
                        <td v-if="$gate.isAdmin()">
                            <a href="#" @click="editModal(schedule)">
                                <i class="fa fa-edit color-blue" title="Edit"></i>
                            </a>
                            |
                            <a href="#" @click="deleteSchedule(schedule.id)">
                                <i class="fa fa-trash-alt color-red" title="Delete"></i>
                            </a>
                        </td>
                        <td>{{schedule.grade_level}}</td>
                        <td>{{schedule.subject.subject}}</td> 
                        <td>{{schedule.day}}</td> 
                        <td>{{schedule.time_start}}&nbsp;-&nbsp;{{schedule.time_end}}</td>
                        <td>{{schedule.room.room}}</td> 
                        <td>{{schedule.user.name}}</td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="pagination mb-0 justify-content-center">
                    <pagination :data="schedules" @pagination-change-page="getResults">
                        <span slot="prev-nav">&lt; Previous</span>
                        <span slot="next-nav">Next &gt;</span>
                    </pagination>
                </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

      <div v-if="!$gate.isTeacherOrAdmin()">
            <not-found></not-found>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title fas fa-clock" v-show="!editMode" id="addNewTitle"> Add New Schedule</h5>
              <h5 class="modal-title fas fa-clock" v-show="editMode" id="addNewTitle"> Update Schedule</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
              <span aria-hidden="true">&times;</span>
            </div>

            <form @submit.prevent="editMode ? updateSchedule() : createSchedule()">
              <div class="modal-body" style="height: 300px; overflow-y: auto;">
                <div class="form-group mb-1">
                    <label for="grade_level">Grade Level and Section</label>
                    <!-- <select name="grade_level" v-model="form1.grade_level" id="grade_level" class="form-control custom-select"
                        :class="{
                        'is-invalid': form1.errors.has('grade_level') }">
                        <option value="" disabled selected>Select</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>  -->
                    <input v-model="form1.grade_level" type="text" name="grade_level"
                        placeholder="Enter Grade Level and Section"
                        class="form-control" :class="{ 'is-invalid': form1.errors.has('grade_level') }">
                    <has-error :form="form1" field="grade_level"></has-error>
                </div>

                <div class="form-group mb-1">
                    <label for="subject_id">Subject <span class="text-danger">*</span> </label>
                    <select class="form-control"  name="subject_id"  v-model="form1.subject_id" :class="{ 'is-invalid': form1.errors.has('subject_id') }">
                        <option value="" disabled selected>Select Subject</option>
                        <option v-for="subject in subjects.data" :key="subject.id" :value="subject.id" selected>{{ subject.subject}}</option>
                        <has-error :form="form1" field="subject_id"></has-error>
                    </select>
                </div>

                <div class="form-group mb-1">
                    <label for="day">Day</label>
                    <select name="day" v-model="form1.day" id="day" class="form-control custom-select"
                        :class="{
                        'is-invalid': form1.errors.has('day') }">
                        <option value="" disabled selected>Select</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <has-error :form="form1" field="day"></has-error>
                    </select> 
                </div>

                <div class="form-group mb-1">
                    <label for="time_start">Start Time <span class="text-danger">*</span> </label>
                    <input v-model="form1.time_start" type="text" name="time_start"
                        placeholder="Start Time"
                        class="form-control" :class="{ 'is-invalid': form1.errors.has('time_start') }">
                    <has-error :form="form1" field="time_start"></has-error>
                </div>

                <div class="form-group mb-1">
                    <label for="time_end">End Time <span class="text-danger">*</span> </label>
                    <input v-model="form1.time_end" type="text" name="time_end"
                        placeholder="End Time"
                        class="form-control" :class="{ 'is-invalid': form1.errors.has('time_end') }">
                    <has-error :form="form1" field="time_end"></has-error>
                </div>

                <div class="form-group mb-1">
                    <label for="room_id">Room <span class="text-danger">*</span> </label>
                    <select class="form-control"  name="room_id"  v-model="form1.room_id" :class="{ 'is-invalid': form1.errors.has('room_id') }">
                        <option value="" disabled selected>Select Room</option>
                        <option v-for="room in rooms.data" :key="room.id" :value="room.id" selected>{{ room.room}}</option>
                        <has-error :form="form1" field="room_id"></has-error>
                    </select>
                </div>
                <div class="form-group mb-1">
                    <label for="user_id">Teacher <span class="text-danger">*</span> </label>
                    <select class="form-control"  name="user_id"  v-model="form1.user_id" :class="{ 'is-invalid': form1.errors.has('user_id') }">
                        <option value="" disabled selected>Select Teacher</option>
                        <option v-for="user in users.data" :key="user.id" :value="user.id" selected>{{ user.name}}</option>
                        <has-error :form="form1" field="user_id"></has-error>
                        
                    </select>
                </div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button v-show="editMode" type="submit" class="btn btn-primary">Update <i class="fas fa-clock"></i></button>
              <button v-show="!editMode" type="submit" class="btn btn-success">Create <i class="fas fa-clock"></i></button>
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
            editMode: false,
            schedules: {},
            users : {},
            subjects : {},
            rooms : {},
            strands : {},
            form1: new Form({
              id: '',
              user_id: '',
              subject_id: '',
              time_start: '',
              time_end: '',
              room_id: '',
              key_stage: 'jhs',
              grade_level: '',
              strand_id: '',
              day:'',
            })
          }
        },
        methods:{
          
          getResults(page = 1) {
            axios.get('api/schedule?page=' + page)
            .then(response => {
              this.schedules = response.data;
            });
		      },
          loadSchedules(){
              axios.get("api/schedule").then(({ data }) => (this.schedules = data));
          },
          loadUsers(){
              axios.get("api/teacher").then(({ data }) => (this.users = data));
          },
          loadSubjects(){
              axios.get("api/subject").then(({ data }) => (this.subjects = data));
          },
          loadRooms(){
              axios.get("api/room").then(({ data }) => (this.rooms = data));
          },
          loadStrands(){
              axios.get("api/strand").then(({ data }) => (this.strands = data));
          },

          newModal(){
                this.editMode = false;
                this.form1.reset();
                $('#addNew').modal('show')
            },
          editModal(schedule){
                this.editMode = true;
                this.form1.reset();
                $('#addNew').modal('show')
                this.form1.fill(schedule);
          },

          createSchedule(){
            this.$Progress.start()

            this.form1.post('api/schedule') //Send HTTP request
            .then(()=>{               //if successful then
              fire.$emit('AfterCreate');
              $('#addNew').modal('hide')
              // Swal.fire('Added New schedule!', '', 'success')
              Toast.fire({
                  icon: 'success',
                  title: 'Schedule added successfully'
              })
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

          deleteSchedule(id){
              Swal.fire({
                      title: 'Delete Schedule?',
                      text: "You won't be able to revert this!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                      if (result.value){
                          this.form1.delete('api/schedule/'+id).then(()=>{
                                  Swal.fire(
                                      'Deleted!',
                                      'Schedule has been deleted.',
                                      'success'
                                  )
                                  fire.$emit('AfterCreate');
                          }).catch(()=>{
                              Swal.fire("Failed!", "There was something wrong.", "warning");
                          })
                      }
                  })
          },
          updateSchedule(){
              // console.log('editing data');
              this.$Progress.start();
              this.form1.put("api/schedule/"+this.form1.id)
              .then(()=>{
                  $('#addNew').modal('hide')
                  // Swal.fire(
                  //     'Updated!',
                  //     'User has been updated.',
                  //     'success'
                  // )
                  Toast.fire({
                      icon: 'success',
                      title: 'Schedule has been updated'
                  })
                  this.$Progress.finish();
                  fire.$emit('AfterCreate')
              })
              .catch(()=>{
                  Swal.fire("Failed!", "There was something wrong.", "warning");
                  this.$Progress.fail();
              })
          },
        },
        created() {
          // fire.$on('searching', ()=>{
          //       let query = this.$parent.search;
          //       axios.get('api/findUser?q=' + query)
          //       .then((data) => {
          //           this.users = data.data
          //       })
          //       .catch(()=>{
                    
          //       })
          //   })
           this.loadSchedules();
           this.loadUsers();
           this.loadSubjects();
           this.loadRooms();
           this.loadStrands();
           //setInterval(() => this.loadSchedules,3000);
           fire.$on('AfterCreate', ()=>{
                this.loadSchedules();
                this.loadUsers();
                this.loadSubjects();
                this.loadRooms();
                this.loadStrands();
            });
        }
    }
</script>
