<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Barang Bapenda</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('assets_backend/plugins/select2/css/select2.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets_backend/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--untuk datatable-->
  <link rel="stylesheet" href="{{ asset('assets_backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('assets_backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets_backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('assets_backend/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets_backend/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets_backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets_backend/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('assets_backend/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- buat tanggal-->

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">{{Auth::user()->name}}
           &nbsp;&nbsp;<i class="fas fa-th-large"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
          <a href="{{ url('/profile') }}" class="dropdown-item">
            <i class="fas fa-user-cog mr-2"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item dropdown-footer" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt mr-2"></i>&nbsp;<b>Logout</b>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center">
      <span class="brand-text-center font-weight-light">E-Barang</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <!-- <a href="{{ url('/dashboard') }}" class="nav-link "> -->
            <a href="{{ url('/home') }}" class="nav-link {{(request()->segment(1) == 'home') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ url('/category') }}" class="nav-link {{(request()->segment(1) == 'category') ? 'active' : ''}}">
              <i class="nav-icon fa fa-list-ul"></i>
              <p>Kategori</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ url('/barang') }}" class="nav-link {{(request()->segment(1) == 'barang') ? 'active' : ''}}">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Barang
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ url('/ambil-barang') }}" class="nav-link {{(request()->segment(1) == 'ambil-barang') ? 'active' : ''}}">
              <i class="fa fa-minus-square nav-icon" aria-hidden="true"></i>
              <p>Ambil Barang</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ url('/beli-barang') }}" class="nav-link {{(request()->segment(1) == 'beli-barang') ? 'active' : ''}}">
              <i class="fa fa-shopping-cart nav-icon" aria-hidden="true"></i>
              <p>Beli Barang</p>
            </a>
          </li>

          {{-- <li class="nav-item has-treeview">
            <a href="{{ url('/saldo-awal') }}" class="nav-link {{(request()->segment(1) == 'saldo-awal') ? 'active' : ''}}">
              <i class="fa fa-money nav-icon" aria-hidden="true"></i>
              <p>Saldo Awal</p>
            </a>
          </li> --}}

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/profile') }}" class="nav-link {{(request()->segment(1) == 'profile') ? 'active' : ''}}">
                  <i class="fas fa-id-card nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/user-list') }}" class="nav-link {{(request()->segment(1) == 'user-list') ? 'active' : ''}} ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/auth/register') }}" class="nav-link {{(request()->segment(1) == 'register') ? 'active' : ''}} ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Register</p>
                </a>
              </li>
            </ul>
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
        <div class="row mb-2">
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            @yield('content')
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer text-center">
    <strong>Copyright &copy; 2021</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets_backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets_backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Select2 -->
<script src="{{ asset('assets_backend/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets_backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets_backend/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets_backend/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('assets_backend/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets_backend/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets_backend/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets_backend/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets_backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets_backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets_backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets_backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets_backend/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets_backend/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets_backend/dist/js/demo.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('assets_backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets_backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets_backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets_backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets_backend/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- page script -->

<script src="{{ asset('assets_backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<!-- buat tanggal-->

<!-- buat tanggal-->
<script src="{{ asset('assets_backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets_backend/plugins/pdfmake/vfs_fonts.js') }}"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>


<script>
  $(document).ready(function () {
    $('.select2').select2();

    $("#datasuara").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    $("#category").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    $("#barang").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    $("#ambil-barang").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    $("#beli-barang").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    $("#user-list").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    $("#saldo").DataTable({
      "responsive": true,
      "autoWidth": false,
      dom: '<"pull-left"B><"pull-left col-sm-8"l><"pull-right"f>tip',
      buttons: [
        {extend: "pdf", className: "btn-light", title: 'BAPENDA KOTA SEMARANG', messageTop: 'Saldo Awal Tahun 2021'},
        {extend: "excel", className: "btn-light", title: 'BAPENDA KOTA SEMARANG', messageTop: 'Saldo Awal Tahun 2021'},
        {extend: "print", className: "btn-light", title: 'BAPENDA KOTA SEMARANG', messageTop: 'Saldo Awal Tahun 2021'}
    ]});
    
  })
</script>
</body>
</html>
