<template>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin Users</h3>

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
                            <i class="fa fa-trash-alt red" title="Delete"></i>
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
              <h5 class="modal-title" id="addNewLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
              <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
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
              
            })
          }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
