<template>
    <div class="container">
         <h3><strong> Announcements</strong></h3>
        <div class="row" v-if="$gate.isTeacherOrAdmin()">
          <div class="col-md-12" >
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Faculty Announcements</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-success" @click="newModal" v-if="$gate.isAdmin()">Add</button>
                </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-head-fixed table-hover">
                  <thead>
                    <tr style="text-align:center;">
                        <th v-if="$gate.isAdmin()" style="width:10px">Action</th>
                        <th style="width:200px">Posting Date</th>
                        <th style="text-align:left;">Announcement</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-if="announcements.total == 0">
                        <td colspan="6" class="text-center"><label>No records yet.</label></td>
                    </tr>
                    <tr style="text-align:center;" v-for="announcement in announcements.data" :key="announcement.id">
                        <td v-if="$gate.isAdmin()">
                            <a href="#" @click="editModal(announcement)">
                                <i class="fa fa-edit color-blue" title="Edit"></i>
                            </a>
                            |
                            <a href="#" @click="deleteAnnouncement(announcement.id)">
                                <i class="fa fa-trash-alt color-red" title="Delete"></i>
                            </a>
                        </td>
                        <td>{{announcement.posting_date}}</td>
                        <td style="text-align:left;">{{announcement.announcement}}</td> 
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="pagination mb-0 justify-content-center">
                    <pagination :data="announcements" @pagination-change-page="getResults">
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
              <h5 class="modal-title fas fa-bullhorn" v-show="!editMode" id="addNewTitle"> Add New Announcement</h5>
              <h5 class="modal-title fas fa-bullhorn" v-show="editMode" id="addNewTitle"> Update Announcement</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
              <span aria-hidden="true">&times;</span>
            </div>

            <form @submit.prevent="editMode ? updateAnnouncement() : createAnnouncement()">
              
                <div class="modal-body" style="overflow-y: auto;">
                    <div class="form-group mb-1">
                        <label for="posting_date">Posting Date<span class="text-danger">*</span> </label>
                        <input v-model="form1.posting_date" type="date" name="posting_date"
                            placeholder="Posting Date"
                            class="form-control" :class="{ 'is-invalid': form1.errors.has('posting_date') }">
                        <has-error :form="form1" field="posting_date"></has-error>
                    </div>

                    <div class="form-group mb-1">
                        <label for="announcement">Announcement <span class="text-danger">*</span></label>
                        <textarea rows="6" v-model="form1.announcement" type="text" name="announcement"
                            placeholder="Enter Announcement"
                            class="form-control" :class="{ 'is-invalid': form1.errors.has('announcement') }">
                        </textarea>
                        <has-error :form="form1" field="announcement"></has-error>
                    </div>

                    
                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button v-show="editMode" type="submit" class="btn btn-primary">Update <i class="fas fa-bullhorn"></i></button>
              <button v-show="!editMode" type="submit" class="btn btn-success">Create <i class="fas fa-bullhorn"></i></button>
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
            announcements: {},
            form1: new Form({
              id: '',
              posting_date: '',
              announcement: '',
            })
          }
        },
        methods:{
          getResults(page = 1) {
            axios.get('api/announcement?page=' + page)
            .then(response => {
              this.announcements = response.data;
            });
		      },
          loadAnnouncements(){
              axios.get("api/announcement").then(({ data }) => (this.announcements = data));
          },
          

          newModal(){
                this.editMode = false;
                this.form1.reset();
                $('#addNew').modal('show')
            },
          editModal(announcement){
                this.editMode = true;
                this.form1.reset();
                $('#addNew').modal('show')
                this.form1.fill(announcement);
          },

          createAnnouncement(){
            this.$Progress.start()

            this.form1.post('api/announcement') //Send HTTP request
            .then(()=>{               //if successful then
              fire.$emit('AfterCreate');
              $('#addNew').modal('hide')
              Toast.fire({
                  icon: 'success',
                  title: 'Announcement added successfully'
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

          deleteAnnouncement(id){
              Swal.fire({
                      title: 'Delete Announcement?',
                      text: "You won't be able to revert this!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                      if (result.value){
                          this.form1.delete('api/announcement/'+id).then(()=>{
                                  Swal.fire(
                                      'Deleted!',
                                      'Announcement has been deleted.',
                                      'success'
                                  )
                                  fire.$emit('AfterCreate');
                          }).catch(()=>{
                              Swal.fire("Failed!", "There was something wrong.", "warning");
                          })
                      }
                  })
          },
          updateAnnouncement(){
              this.$Progress.start();
              this.form1.put("api/announcement/"+this.form1.id)
              .then(()=>{
                  $('#addNew').modal('hide')
                  // Swal.fire(
                  //     'Updated!',
                  //     'User has been updated.',
                  //     'success'
                  // )
                  Toast.fire({
                      icon: 'success',
                      title: 'Announcement has been updated'
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
           this.loadAnnouncements();
           fire.$on('AfterCreate', ()=>{
                this.loadAnnouncements();
            });
        }
    }
</script>
