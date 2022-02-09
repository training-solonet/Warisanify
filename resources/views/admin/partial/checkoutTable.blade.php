@extends('admin.base')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        {{-- <a href="javascript:void(0)" class="btn btn-lg btn-info mb-5" onclick='add'>Add Category</a> --}}
        <button class="btn btn-lg btn-info mb-5" onclick="">Add Category</button>
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

@endsection