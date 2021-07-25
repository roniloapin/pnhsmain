<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row mt-2" v-if="$gate.isTeacher()">
                    <h2 class="text-primary">Welcome to PNHS Enrollment System!</h2>
                </div>

                <div class="row mt-2" v-if="$gate.isAdminOrRegistrar()">
                    <div class="col-md-12"><h3 class="text-primary">Welcome to PNHS Enrollment System!</h3></div>
                    

                    <div class="col-md-3 col-sm-6 col-xs-12 mt-2">
                        <div class="info-box">
                            <span class="info-box-icon bg-green "><i class="fa fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text text-center">System Users</span>
                                <h2 class="info-box-number text-center"> {{userCount.userCount}} </h2>
                            </div>
                                <!-- /.info-box-content -->
                        <!-- /.info-box -->
                        </div>
                    <!-- /.col -->
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 mt-2">
                        <div class="info-box">
                            <span class="info-box-icon bg-blue "><i class="fa fa-user-graduate"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text text-center">Students</span>
                                <h2 class="info-box-number text-center">{{studentCount.studentCount}}</h2>
                            </div>
                                <!-- /.info-box-content -->
                        <!-- /.info-box -->
                        </div>
                    <!-- /.col -->
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 mt-2">
                        <div class="info-box">
                            <span class="info-box-icon bg-orange "><i class="fa fa-clock"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text text-center">Schedule</span>
                                <h2 class="info-box-number text-center">{{scheduleCount.scheduleCount}}</h2>
                            </div>
                                <!-- /.info-box-content -->
                        <!-- /.info-box -->
                        </div>
                    <!-- /.col -->
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 mt-2">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="fa fa-bullhorn"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text text-center">Announcements</span>
                                    <h2 class="info-box-number text-center"> {{announcementCount.announcementCount + publicAnnouncementCount.publicAnnouncementCount}} </h2>
                                </div>
                                <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                        <!-- /.col -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
          return{
              userCount: {},
              studentCount: {},
              announcementCount: {},
              publicAnnouncementCount: {},
              scheduleCount: {},
          }
        },
        methods:{
          loadDashboards(){
              axios.get("api/dashboard").then(({ data }) => ([this.userCount = data,this.studentCount = data, this.scheduleCount = data, this.announcementCount = data, this.publicAnnouncementCount = data]));
          },
        },
            created() {
            this.loadDashboards();
            fire.$on('AfterCreate', ()=>{
                    this.loadDashboards();
                });
        }
    }
</script>
