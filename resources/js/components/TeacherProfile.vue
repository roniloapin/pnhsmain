<template>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div v-if="!$gate.isTeacher()">
                <not-found></not-found>
            </div>

            <div class="col-md-10" v-if="$gate.isTeacher()">
                <div class="card">
                    <div class="card-header card-success card-outline text-success fas fa-user-edit"> User Profile</div>
                        <div class="card-body">
                            <form class="form-horizontal" @submit.prevent="updateUser">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-8">
                                        <input v-model="form.name" type="text" name="name"
                                            placeholder="Name*"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input v-model="form.email" type="text" name="email"
                                            placeholder="Email*"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                        <has-error :form="form" field="email"></has-error>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input v-model="form.password" type="text" name="password"
                                            placeholder="Password*" id="password"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                            <input type="checkbox" @click="togglePassword()" > <i class="fa fa-fw fa-eye-slash"></i> Hide Password
                                        <has-error :form="form" field="password"></has-error>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                                </form>
                        </div>
                    </div>
                </div>           
            </div>
        </div>
</template>

<script>
    import Form from 'vform'
    export default {
        data(){
            
            return{
                
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
        methods: {
            updateUser(){
                // console.log('editing data');
              this.$Progress.start();
              this.form.put("api/profile/"+this.form.id)
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
        created(){
            axios.get("api/profile").then(({ data }) => (this.form.fill(data)));
            fire.$on('AfterCreate', ()=>{
                axios.get("api/profile").then(({ data }) => (this.form.fill(data)));
            });
        }
    }
</script>


<style>
    .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
        }
</style>
