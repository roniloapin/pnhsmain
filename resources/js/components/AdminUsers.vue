<template>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin Users</h3>

                <div class="card-tools">
                  
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
                            <i class="fa fa-edit color-blue" title="Edit"></i>
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
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
