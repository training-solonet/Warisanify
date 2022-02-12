@extends('admin.base')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        {{-- <a href="javascript:void(0)" class="btn btn-lg btn-info mb-5" onclick='add'>Add Category</a> --}}
        <button class="btn btn-lg btn-info mb-5" onclick="addCategory()">Add Category</button>
        <table id="CategoryTable" class="table table-bordered table-striped" width="100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@include('admin.partial.formModalCategory')
@include('admin.partial.deleteAlert')
@endsection


@section('script')
<script type="text/javascript">
  $(document).ready(function(){
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });

    $("#CategoryTable").DataTable({
        ordering: false,
        processing : true,
        serverSide : true,
        ajax : {
            url : "{{ route('admin.category.index') }}",
            type : "GET"
        },
        columns: [
            {
                data : 'DT_RowIndex',
                orderable : false,
                searchable : false
            },
            {data: "name"},
            {data: "action"}
        ]
    });
  });

  function addCategory(){
    $('#errors_name').text('');
    $('#id').val('');
    $('#formCategory').trigger("reset");
    $('#titleModalCategory').html("Add Category");
    $('#categoryModal').modal('show');
    }

    function saveCategory(){
    var formData = new FormData($('#formCategory')[0]);
        $.ajax({
            url : "{{ route('admin.category.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (data){
                if(data.status){
                    alert("Data Saved");
                    var oTable = $('#CategoryTable').dataTable();
                    oTable.fnDraw(false); //reset datatable
                    $('#categoryModal').modal('hide')
                }else{
                    if(data.errors.category){
                        console.log(data.category)
                        $('#errors_name').text(data.errors.category[0]);
                    }
                }
            },
            error: function(error){
                console.log(error);
                alert("Data Not Saved");
            }
        });
    }


  function editCategory(id) {
      console.log(id)
    $('#errors_name').text('');
            $.get('/admin/category/' + id + '/edit', function (data) {
                $('#formCategory')[0].reset();
                $('#titleModalCategory').html("Edit Post");
                $('#categoryModal').modal('show');
                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas
                $('#id').val(data.id);
                $('#name').val(data.name);
            })
  }

</script>
@endsection

