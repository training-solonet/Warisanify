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
        <table id="detailCheckout" class="table table-bordered table-striped" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Sell Code</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

@endsection

@section('script')

<script type="text/javascript">

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        })
    });

    $("#detailCheckout").DataTable({
        processing : true,
        serverSide : true,
        ajax: {
            url : "{{ route('admin.checkoutDetails.index') }}",
            type : "GET"
        },
        columns: [
            {
                data : 'DT_RowIndex',
                orderable : false,
                searchable : false
            },
            {data: 'sell_code'},
            {data: 'product.name'},
            {data: 'qty'},
            {data: 'price_per_item'}
        ]
    })

</script>

@endsection
