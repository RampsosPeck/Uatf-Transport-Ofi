<!DOCTYPE html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="Welcome to the University Transportation UATF website">
  <meta name="author" content="Ing. George Peralta">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>UATF | TRANSPORT</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/css/app.css">
   <link rel="shortcut icon" href="{!! URL::to('/img/bus.png') !!}" />
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand  navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <div class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <!--<img src="{{ asset('/img/mail.png') }}"   class="brand-image " >-->
          <i class="green"> <b> Mensajes </b></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('/img/linux.png') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
               <img src="{{ asset('/img/linux.png') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('/img/linux.png') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">
          <img src="{{ asset('/img/alert.png') }}"   class="brand-image " >
          <i class="ba"> <b> Notificaciones </b></i>
        </a>
      </li>
      <notifications></notifications>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <router-link to="/dashboard" class="brand-link text-center">
      <img src="{{ asset('/img/startupbus.png') }}" alt="AdminLTE Logo" class="brand-image elevation-3">
      <span class="brand-text font-weight-light teal"> <i> <b>UATFTRANS </b> </i></span>
    </router-link>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/profile/'.Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <router-link to="/" class="d-block">{{ Auth::user()->name }}</router-link>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <router-link to="/dashboard" class="nav-link">
              <!--<i class="nav-icon fas fa-tachometer-alt blue"></i>-->
              <img src="{{ asset('/img/dashboard.png') }}"  class="nav-icon">
              <p class="teal">
                Tablero 
              </p>
            </router-link>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <!--<i class="nav-icon fas fa-cog green"></i>-->
              <img src="{{ asset('/img/robot.png') }}"  class="nav-icon">
               <p class="teal">
                Administración
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/users" class="nav-link ">
                  <!--<i class="fas fa-users nav-icon teal"></i>-->
                  <img src="{{ asset('/img/agenda.png') }}"  class="nav-icon">
                  <p class="teal">Usuarios</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/targets" class="nav-link ">
                  <img src="{{ asset('/img/card.png') }}"  class="nav-icon">
                  <p class="teal">Tarjetas</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/developer" class="nav-link">
                  <img src="{{ asset('/img/admin.png') }}"  class="nav-icon">
                    <p class="teal">
                    Developer 
                      <span class="right badge badge-danger">New</span>
                    </p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <router-link to="/qrshow" class="nav-link">
              <!--<i class="nav-icon fas fa-cogs purple"></i>-->
              <img src="{{ asset('/img/miqr.png') }}"  class="nav-icon">
              <p class="teal">
                Mi Código QR 
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/qrusers" class="nav-link">
              <!--<i class="nav-icon fas fa-cogs purple"></i>-->
              <img src="{{ asset('/img/userqr.png') }}"  class="nav-icon">
              <p class="teal">
                QR Usuarios 
                <span class="right badge badge-info">scan</span>
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/qrvehis" class="nav-link">
              <!--<i class="nav-icon fas fa-cogs purple"></i>-->
              <img src="{{ asset('/img/jeep.png') }}"  class="nav-icon">
              <p class="teal">
                QR Vehículos 
                <span class="right badge badge-info">scan</span>
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/smsmen" class="nav-link">
              <!-- <i class="nav-icon fas fa-user purple"></i> -->
              <img src="{{ asset('/img/sms.png') }}"  class="nav-icon">
              <p class="teal">
                Enviar Mensaje
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <!-- <i class="nav-icon fas fa-user purple"></i> -->
              <img src="{{ asset('/img/reportes.png') }}"  class="nav-icon">
              <p class="teal">
                Reportes 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <router-link to="/manual" class="nav-link">
              <!-- <i class="nav-icon fas fa-user purple"></i> -->
              <img src="{{ asset('/img/guide.png') }}"  class="nav-icon">
              <p class="teal">
                Manual 
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/profile" class="nav-link">
              <img src="{{ asset('/img/profile.png') }}"  class="nav-icon">
              <p class="teal">
                Profile 
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/android" class="nav-link">
               <!--<i class="nav-icon fa fa-th orange"></i>-->
               <img src="{{ asset('/img/hacker.png') }}"  class="nav-icon">
              <p class="teal">
                Acerca de...
                <span class="right badge badge-primary">IT</span>
              </p>
            </router-link>
          </li>
          <li class="nav-item"> 
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                            <!-- <i class="nav-icon fas fa-power-off red"></i> -->
                            <img src="{{ asset('/img/salida.png') }}"  class="nav-icon">
                <p class="teal">{{ __('Salir') }} </p>
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
    <!-- Content Header (Page header) 
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
           
        </div> /.row 
      </div>/.container-fluid
    </div>-->
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
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
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar <--></-->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
       <a href="http://www.uatf.edu.bo" target="__blanck"  style="color: #011620;">U.A.T.F.</a> - {{ date('Y') }}
    </div>
    <!-- Default to the left -->
    <strong>Created by <b class="text-primary"> &copy; </b> <a href="https://goo.gl/5RDQ6n" target="__blanck" style="color: #011620;"> <i> Ing. Jorge Peralta</i></a></strong>  
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS --> 
<script src="/js/app.js"></script> 
</body>
</html>
