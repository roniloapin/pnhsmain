<template>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-success" @click="newModal">Add User <i class="fas fa-user-plus fa-fw"></i></button>
                </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed table-hover">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>ID</th>
                      <th>Name</th>
                      <th>E-mail</th>
                      <th>Role</th>
                      <th>Date Added</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in users.data" :key="user.id">
                      <td>
                        <a href="#" @click="editModal(user)">
                            <i class="fa fa-edit color-blue" title="Edit"></i>
                        </a>
                        |
                        <a href="#" @click="deleteUser(user.id)">
                            <i class="fa fa-trash-alt color-red" title="Delete"></i>
                        </a>
                        |
                        <a href="#">
                            <i class="fas fa-eye color-green"></i>
                        </a>
                      </td>
                      <td>{{user.id}}</td>
                      <td style="text-align:left;">{{user.name}}</td>
                      <td><span class="tag tag-success">{{user.email}}</span></td>
                      <td>{{user.role | capitalize}}</td>
                      <td>{{user.created_at | myDate}}</td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

      <!-- Modal -->
      <div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title fas fa-user-plus" v-show="!editMode" id="addNewTitle"> Add New User</h5>
              <h5 class="modal-title fas fa-user-edit" v-show="editMode" id="addNewTitle"> Update User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
              <span aria-hidden="true">&times;</span>
            </div>

            <form @submit.prevent="editMode ? updateUser() : createUser()">
                <div class="modal-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input v-model="form.name" type="text" name="name"
                      placeholder="Enter name here"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                    <has-error :form="form" field="name"></has-error>
                  </div>

                  <div class="form-group">
                    <label>E-mail</label>
                    <input v-model="form.email" type="text" name="email"
                      placeholder="Enter e-mail here"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                    <has-error :form="form" field="email"></has-error>
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input v-model="form.password" type="text" name="password"
                      placeholder="Enter password here (at least 6 characters)"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                      <!-- <input type="checkbox" @click="togglePassword()" > Hide Password -->
                    <has-error :form="form" field="password"></has-error>
                  </div>

                <div class="form-group">
                    <label>User Role</label>
                    <select name="role" v-model="form.role" id="role" class="form-control custom-select" :class="{
                    'is-invalid': form.errors.has('role') }">
                        <option value="" disabled>Select User Role</option>
                        <option value="admin">Admin</option>
                        <option value="teacher">Teacher</option>
                        <option value="student">Student</option>
                    </select>
                    <has-error :form="form" field="role"></has-error>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button v-show="editMode" type="submit" class="btn btn-primary">Update <i class="fas fa-user-edit"></i></button>
              <button v-show="!editMode" type="submit" class="btn btn-success">Create <i class="fas fa-user-plus"></i></button>
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
            users : {},
            form: new Form({
              id: '',
              name: '',
              email: '',
              password: '',
              role: '',
              remarks: '',
            })
          }
        },
        methods:{
          // togglePassword(){
          //       var x = document.getElementById("password");
          //       if (x.type === "password") {
          //           x.type = "text";
          //       } else {
          //           x.type = "password";
          //       }
          // },
          loadUsers(){
            axios.get("api/user").then(({ data }) => (this.users = data));
          },

          newModal(){
                this.editMode = false;
                this.form.reset();
                $('#addNew').modal('show')
            },
          editModal(user){
                this.editMode = true;
                this.form.reset();
                $('#addNew').modal('show')
                this.form.fill(user);
          },

          createUser(){
            this.$Progress.start()

            this.form.post('api/user') //Send HTTP request
            .then(()=>{               //if successful then
              fire.$emit('AfterCreate');
              $('#addNew').modal('hide')
              Swal.fire('Added New user!', '', 'success')
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

          deleteUser(id){
              Swal.fire({
                      title: 'Delete User?',
                      text: "You won't be able to revert this!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                      if (result.value){
                          this.form.delete('api/user/'+id).then(()=>{
                                  Swal.fire(
                                      'Deleted!',
                                      'User has been deleted.',
                                      'success'
                                  )
                                  fire.$emit('AfterCreate');
                          }).catch(()=>{
                              Swal.fire("Failed!", "There was something wrong.", "warning");
                          })
                      }
                  })
          },
          updateUser(){
              // console.log('editing data');
              this.$Progress.start();
              this.form.put("api/user/"+this.form.id)
              .then(()=>{
                  $('#addNew').modal('hide')
                  Swal.fire(
                      'Updated!',
                      'User has been updated.',
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
        },
        created() {
           this.loadUsers();
           //setInterval(() => this.loadUsers,3000);
           fire.$on('AfterCreate', ()=>{
                this.loadUsers();
            });
        }
    }
</script>
