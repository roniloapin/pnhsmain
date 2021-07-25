
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel='icon' href='logo.png' type='image/x-icon'/>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>PNHS Enrollment System</title>

  <link rel="stylesheet" href="/css/app.css">

  <style> 
        /* Modify the background color */ 
          
        .navbar-custom { 
            background-color: #343a40; 
        } 
        /* Modify brand and text color */ 
          
        .navbar-custom .navbar-brand, 
        .navbar-custom .navbar-text { 
            color: white; 
        }

        .navbar-search{
          
        }

        .footer-custom { 
            background-color: #003432; 
        } 
    </style>
</head>
<body class="hold-transition sidebar-mini">
    <input type="text" value="{{ Auth::user()->id }}" hidden id="user_id">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-custom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars" style="color:#FFFFFF"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
      <div class="input-group input-group-sm">
        <input style="border-radius: 20px; width: 500px;" class="form-control form-control-navbar" @keyup="searchit" v-model="search" type="search" placeholder="Search here..." aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" @click="search">
            <i class="fas fa-search" style="color:#FFFFFF"></i>
          </button>
        </div>
      </div>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <span class="badge badge-success "></span>      
      </li>
    
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
        <i class="fas fa-bell"></i></a>
            <span class="badge badge-warning navbar-badge"></span>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="./img/logo.png" alt="PNHS" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PNHS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="./img/user.png" class="img-circle" alt="User Image">
        </div> -->
        <div class="info">
          <span class="brand-text font-weight-light" style="color: white; font-size: large;">PNHS Enrollment System</span><br>
          <a class="d-block" style="margin-left:20px;">Hello!<strong style="color:white;"> {{ Auth::user()->name }}</strong> </a>
          <!-- <a style="font-size: 11px; margin-left:40px;" class="d-block">User ID:<strong style="color:white;"> {{ Auth::user()->id }}</strong> </a> -->
          <a style="font-size: 11px; margin-left:20px;" class="d-block">Status:<strong style="color:#39ea39;"> Online</strong> </a>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>

        
      </div>
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @can('isTeacher')
          <li class="nav-item">
            <router-link to="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
              </p>
            </router-link>
          </li>
          @endcan
          
          @can('isAdminOrRegistrar')
          <li class="nav-item">
            <router-link to="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </router-link>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-university"></i>
              <p>
                Admission
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
                <ul class="nav nav-treeview" style="margin-left:20px;">
                  <li class="nav-item">
                      <router-link to="/jhsstudents-p" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>Pending JHS Students</p>
                      </router-link>
                  </li>
                </ul>

                <ul class="nav nav-treeview" style="margin-left:20px;">
                  <li class="nav-item">
                      <router-link to="/jhsstudents-a" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>Approved JHS Students</p>
                      </router-link>
                  </li>
                </ul>

                <ul class="nav nav-treeview" style="margin-left:20px;">
                  <li class="nav-item">
                      <router-link to="/shsstudents-p" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>Pending SHS Students</p>
                      </router-link>
                  </li>
                </ul>

                <ul class="nav nav-treeview" style="margin-left:20px;">
                  <li class="nav-item">
                      <router-link to="/shsstudents-a" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>Approved SHS Students</p>
                      </router-link>
                  </li>
                </ul>


          </li>
          @endcan
          @can('isTeacherOrAdminOrRegistrar')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Schedule
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left:20px;">
              <li class="nav-item">
                <router-link to="/jhsschedule" class="nav-link">
                  <i class="nav-icon fas fa-clock"></i>
                  <p>JHS Schedule</p>
                </router-link>
              </li>

              <li class="nav-item">
                <router-link to="/shsschedule" class="nav-link">
                  <i class="nav-icon fas fa-clock"></i>
                  <p>SHS Schedule</p>
                </router-link>
              </li>
            </ul>
          </li>
          @endcan
          @can('isAdmin')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left:20px;">
              <li class="nav-item">
                <router-link to="/users" class="nav-link">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>Admin Users</p>
                </router-link>
              </li>
              
              <li class="nav-item">
                  <router-link to="/teacher" class="nav-link">
                    <i class="nav-icon fas fa-chalkboard-teacher"></i>
                    <p>Teachers</p>
                  </router-link>
              </li>
            
              <li class="nav-item">
                <router-link to="/configuration" class="nav-link">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>Configuration</p>
                </router-link>
              </li>

              <li class="nav-item">
                <router-link to="/systemsettings" class="nav-link">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>System Settings</p>
                </router-link>
              </li>
            </ul>
          </li>
          @endcan
          
          <!-- @can('isStudent')
          <li class="nav-item">
            <router-link to="/studentprofile" class="nav-link">
              <i class="nav-icon fas fa-user-edit"></i>
              <p>
                Student Profile
              </p>
            </router-link>
          </li>       
          @endcan -->




          @can('isTeacherOrAdmin')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Announcements
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left:20px;">
              <li class="nav-item">
                <router-link to="/announcement" class="nav-link">
                  <i class="nav-icon fas fa-bullhorn"></i>
                  <p>
                    Faculty Announcement
                  </p>
                </router-link>
              </li> 

              <li class="nav-item">
                <router-link to="/publicannouncement" class="nav-link">
                  <i class="nav-icon fas fa-bullhorn"></i>
                  <p>
                    Public Announcement
                  </p>
                </router-link>
              </li>
              
            </ul>
          </li>
          @endcan

          <!-- @can('isTeacherOrAdmin')
          <li class="nav-item">
            <router-link to="/profile" class="nav-link">
              <i class="nav-icon fas fa-user-edit"></i>
              <p>
                 Profile
              </p>
            </router-link>
          </li>       
          @endcan -->
          
          <li class="nav-item">
            <router-link to="/about" class="nav-link">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
                About
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out-alt nav-icon" style="color:red;"></i>
                <p>
                  {{ __('Logout') }}  
                </p>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
            <router-view></router-view>
            <vue-progress-bar></vue-progress-bar>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      
      <h5>Notifications</h5>
      <p>No new notifications</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer bg-dark">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; {{ now()->year }} <a href="#">PNHS</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

@auth
  <script>
      window.user= @json(auth()->user())
  </script>
@endauth

<script src="/js/app.js"></script>
</body>
</html>
