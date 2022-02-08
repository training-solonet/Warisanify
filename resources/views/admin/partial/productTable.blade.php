@extends('admin.base')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <a href="javascript:void(0)" class="btn btn-lg btn-info mb-5" onclick=addProduct()>Add Product</a>
        <table id="productTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Sale Price</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Stock Status</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@include('admin.partial.formModal')
@include('admin.partial.deleteAlert')
@endsection


@section('script')
<script type="text/javascript">

  function addProduct(){
    $('#errors_name').text('');
    $('#id').val('');
    $('#form').trigger("reset");
    $('#exampleModalLabel').html("Add Product");
    $('#product_modal').modal('show');
    }

    function save(){
    var formData = new FormData($('#form')[0]);
        $.ajax({
            url : "{{ route('admin.product.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (data){
                if(data.status){
                    alert("Data Saved");
                    var oTable = $('#productTable').dataTable();
                    oTable.fnDraw(false); //reset datatable
                    $('#product_modal').modal('hide')
                }else{
                    if(data.errors.product){
                        console.log(data.product)
                        $('#errors_name').text(data.errors.product[0]);
                    }
                }
            },
            error: function(error){
                console.log(error);
                alert("Data Not Saved");
            }
        });
    }


  function editProduct(id) {
      console.log("cek")
    $('#errors_name').text('');
            $.get('/admin/product/' + id + '/edit', function (data) {
                $('#form')[0].reset();
                $('#exampleModalLabel').html("Edit Post");
                $('#product_modal').modal('show');
                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#regular_price').val(data.regular_price);
                $('#sale_price').val(data.sale_price);
                $('#category_id').val(data.category_id);
                $('#description').val(data.description);
                $('#stock_status').val(data.stock_status);
                $('#quantity').val(data.quantity);
                // $('#foto').val(data.foto);
            });
  };
</script>
@endsection

