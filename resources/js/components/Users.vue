<template>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addNew">Add New <i class="fas fa-user-plus fa-fw"></i></button>
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
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <a href="#">
                            <i class="fa fa-edit blue" title="Edit"></i>
                        </a>
                        |
                        <a href="#">
                            <i class="fa fa-trash-alt color-red" title="Delete"></i>
                        </a>
                      </td>
                      <td>001</td>
                      <td>Kim Shin Nodalo</td>
                      <td><span class="tag tag-success">kimshin@gmail.com</span></td>
                      <td>Student</td>
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
              <h5 class="modal-title" id="addNewLabel">Add New User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
              <span aria-hidden="true">&times;</span>
            </div>

            <form @submit.prevent="createUser">
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
                      placeholder="Enter password here"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                    <has-error :form="form" field="password"></has-error>
                  </div>

                <div class="form-group">
                    <label>User Role</label>
                    <select name="role" v-model="form.role" id="role" class="form-control custom-select" :class="{
                    'is-invalid': form.errors.has('role') }">
                        <option value="" disabled>Select User Role</option>
                        <option value="admin">Admin</option>
                        <option value="teacher">Teacher</option>
                        <option value="student">student</option>
                    </select>
                    <has-error :form="form" field="role"></has-error>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
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
            form: new Form({
              name: '',
              email: '',
              password: '',
              role: '',
              remarks: '',
            })
          }
        },
        methods:{
          createUser(){
            this.form.post('api/user');
          }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
