@extends('admin.base')

@section('content')

<div class="container-fluid">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="checkoutTable" class="table table-bordered table-striped" width="100%">
            <thead>
                <tr class="table-head">
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Province</th>
                    <th scope="col">City</th>
                    <th scope="col">Courier</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Origin</th>
                    <th scope="col">Sell Code</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
</div>

@endsection

@section('script')

<script type="text/javascript">

    $(document).ready(function(){
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $('#checkoutTable').DataTable({
        processing: true,
        serverSide: true,
        ajax : {
            url   :  "{{ route('admin.checkoutAdmin.index') }}",
            type  : 'GET'
        },
        columns : [
            {
                data: 'DT_RowIndex',
                orderable : false,
                searchable : false
            },
            {data: 'username'},
            {data: 'telp'},
            {data: 'province'},
            {data: 'city'},
            {data: 'courier'},
            {data: 'cost'},
            {data: 'origin'},
            {data: 'sell_code'},
            {data: 'status'}
        ]
    });


</script>

@endsection
