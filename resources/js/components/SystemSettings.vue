<template>
    <div class="container">
         <h3><strong> System Logo</strong></h3>
        <div class="row" v-if="$gate.isAdmin()">
          <div class="col-md-6" >
            <button type="button" class="btn btn-success" style="float:left;" @click="newModal" v-if="$gate.isAdmin()">Edit</button>
            
            <!-- <button type="button" class="btn btn-dark" style="float:left; margin-left:5px" @click="newModal" v-if="$gate.isAdmin()">Download</button> -->
            <br><br>
            <img src="/img/logo.png" alt="System Logo" style="width:200px; height:200px; align:center; ">
            <!-- /.card -->

          </div>
        </div>

      <div v-if="!$gate.isAdmin()">
            <not-found></not-found>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" v-show="!editMode" id="addNewTitle"> Update System Logo</h5>
              <!-- <h5 class="modal-title" v-show="editMode" id="addNewTitle"> <i class="fas fa-bullhorn"></i> Update System Settings</h5> -->
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
              <span aria-hidden="true">&times;</span>
            </div>

            <form @submit.prevent="updateSystemSetting()">
                <div class="modal-body" style="overflow-y: auto;">
                    <!-- <div class="form-group mb-1">
                        <label for="sys_name">System Name<span class="text-danger">*</span> </label>
                        <input v-model="form1.sys_name" type="text" name="sys_name"
                            placeholder="System Name"
                            class="form-control">
                        <has-error :form="form1" field="sys_name"></has-error><br>
                    </div> -->
                    
                    <div class="form-group mb-1">
                        <label for="system_logo">Logo <span class="text-danger">*</span></label>
                        
                        <input type="file" @change="getBase64" id="system_logo" accept="image/x-png,image/gif,image/jpeg"><br>
                        <br><label for="preview">Preview: </label>
                        <img :src="avatar" alt="Image" id="preview" style="width: 100px; height:100px;">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <button v-show="!editMode" type="submit" class="btn btn-primary">Update</button>
                  <!-- <button v-show="!editMode" type="submit" class="btn btn-success">Create <i class="fas fa-bullhorn"></i></button> -->
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
            system_settings: {},
            avatar: null,
            form1: new Form({
              id: '',
              sys_name: 'System Logo',
              sys_logo: '',
            })
          }
        },
        methods:{
          getBase64(e){
              // $('#new_image').val(null)
              // const file = e.target.files[0];
              // this.form1 = e.target.files;
              // console.log(e.target.files)

              let image =   e.target.files[0]
              let reader =  new FileReader();
              reader.readAsDataURL(image);
              reader.onload = e => {
                
                this.avatar = e.target.result
                this.form1.sys_logo = e.target.result;
                // console.log(e.target.result)
              }

          },
          getResults(page = 1) {
            axios.get('api/system_setting?page=' + page)
            .then(response => {
              this.system_settings = response.data;
            });
		      },
          loadSystemSetting(){
              //  axios.get("api/system_setting").then(({ data }) => (this.system_settings = data));
          },
          

          newModal(){
                this.editMode = false;
                this.form1.reset();
                $('#addNew').modal('show')
            },
          editModal(system_setting){
                this.editMode = true;
                this.form1.reset();
                $('#addNew').modal('show')
                this.form1.fill(system_setting);
          },

          createSystemSetting(){
            this.$Progress.start()

            this.form1.post('api/system_setting') //Send HTTP request
            .then(()=>{               //if successful then
              fire.$emit('AfterCreate');
              $('#addNew').modal('hide')
              Toast.fire({
                  icon: 'success',
                  title: 'System Settings added successfully'
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

          deleteSystemSetting(id){
              Swal.fire({
                      title: 'Delete System Setting?',
                      text: "You won't be able to revert this!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                      if (result.value){
                          this.form1.delete('api/system_setting/'+id).then(()=>{
                                  Swal.fire(
                                      'Deleted!',
                                      'System Settings has been deleted.',
                                      'success'
                                  )
                                  fire.$emit('AfterCreate');
                          }).catch(()=>{
                              Swal.fire("Failed!", "There was something wrong.", "warning");
                          })
                      }
                  })
          },
          updateSystemSetting(){
              this.$Progress.start();
              axios.put('api/systemsetting/'+1, this.form1).then(res=>{
                  if(res.status==200){
                    console.log(res.data.base64)
                    $('#addNew').modal('hide')
                    Toast.fire({
                        icon: 'success',
                        title: 'System Logo has been updated'
                    })
                    this.$Progress.finish();
                    
                    fire.$emit('AfterCreate')
                  }
              }).catch(err=>{
                console.log(err);
                  Swal.fire("Failed!", "There was something wrong.", "warning");
                  this.$Progress.fail();
              });

              // this.form1.put("api/systemsetting/"+1, this.form1)
              // .then(()=>{
              //   console.log
              //     $('#addNew').modal('hide')
              //     // Swal.fire(
              //     //     'Updated!',
              //     //     'User has been updated.',
              //     //     'success'
              //     // )
              //     Toast.fire({
              //         icon: 'success',
              //         title: 'System Settings has been updated'
              //     })
              //     this.$Progress.finish();
              //     fire.$emit('AfterCreate')
              // })
              // .catch(()=>{
              //     Swal.fire("Failed!", "There was something wrong.", "warning");
              //     this.$Progress.fail();
              // })
          },
        },
        created() {
           this.loadSystemSetting();
           fire.$on('AfterCreate', ()=>{
                this.loadSystemSetting();
                location.reload();
            });
        }
    }
</script>
