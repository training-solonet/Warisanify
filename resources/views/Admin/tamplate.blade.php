
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!--booststrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url("Admin/plugins/fontawesome-free/css/all.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url("Admin/dist/css/adminlte.min.css") }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ ("Admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") }}">
  <link rel="stylesheet" href="{{ ("Admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css") }}">
  <link rel="stylesheet" href="{{ ("Admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css") }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
    @include('Admin.partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('Admin.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    {{-- @yield('coba') --}}
    <!-- Main content -->
        {{-- @include('Admin.partials.content') --}}
        @yield('content')
            <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- MULAI MODAL KONFIRMASI DELETE-->
  @include('Admin.partials.modal.delete')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Main Footer -->
  @include('Admin.partials.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="{{ url("Admin/plugins/jquery/jquery.min.js") }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url("Admin/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ url("Admin/dist/js/adminlte.min.js") }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ ("Admin/plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ ("Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }}"></script>
<script src="{{ ("Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js") }}"></script>
<script src="{{ ("Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") }}"></script>
<script src="{{ ("Admin/plugins/datatables-buttons/js/dataTables.buttons.min.js") }}"></script>
<script src="{{ ("Admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js") }}"></script>
<script src="{{ ("Admin/plugins/jszip/jszip.min.js") }}"></script>
<script src="{{ ("Admin/plugins/pdfmake/pdfmake.min.js") }}"></script>
<script src="{{ ("Admin/plugins/pdfmake/vfs_fonts.js") }}"></script>
<script src="{{ ("Admin/plugins/datatables-buttons/js/buttons.html5.min.js") }}"></script>
<script src="{{ ("Admin/plugins/datatables-buttons/js/buttons.print.min.js") }}"></script>
<script src="{{ ("Admin/plugins/datatables-buttons/js/buttons.colVis.min.js") }}"></script>

@yield('script')


</body>
</html>
