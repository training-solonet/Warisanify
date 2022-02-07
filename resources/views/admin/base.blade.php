
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ url('AdminLTE/dist/css/adminlte.min.css') }}">
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('admin.partial.navbarPartial')
    @include('admin.partial.sidebarPartial')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('admin.partial.headingPartial')
   @yield('content')
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
  <!-- /.control-sidebar -->

  <!-- Main Footer -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="{{ url('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('AdminLTE/dist/js/adminlte.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ url('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ url('AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ url('AdminLTE/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ url('AdminLTE/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ url('AdminLTE/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ url('AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ url('AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ url('AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

@yield('script')
<script type="text/javascript">
    $(document).ready(function(){
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $("#productTable").DataTable({
        ordering: false,
        processing : true,
        serverSide : true,
        ajax : {
            url : "{{ route('admin.product.index') }}",
            type : "GET"
        },
        columns: [
            {
                data : 'DT_RowIndex',
                orderable : false,
                searchable : false
            },
            {data: "image"},
            {data: "name"},
            {data: "regular_price"},
            {data: "sale_price"},
            {data: "category.name"},
            {data: "description"},
            {data: "stock_status"},
            {data: "quantity"},
            {data: "action"}
        ],
        columnDefs:
        [{
            "targets" : 1,
            "render" : function (data, type, row, meta){
                return "<img src=\"/Assets/images/" + data + "\" height=\"60\"/>";
            }
        }]
    });


    function deleteShowModal(id) {
    $('#confirmation-delete-modal').modal('show');

    $('#delete-button').click(function(){
        $.ajax({
            url: "/admin/product/" + id, //eksekusi ajax ke url ini
            type: 'DELETE',
            success: function (data) { //jika sukses
                console.log("cek")
                setTimeout(function() {
                    $('#confirmation-delete-modal').modal('hide'); //sembunyikan konfirmasi modal
                    var oTable = $('#productTable').dataTable();
                    var DeleteTable = $('#CategoryTable').dataTable();
                    DeleteTable.fnDraw(false); //reset datatable
                    oTable.fnDraw(false); //reset datatable
                });
            }, error: function (){
                console.log("error")
            }
        });
    });
}
</script>
</body>
</html>
