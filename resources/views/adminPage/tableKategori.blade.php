@extends('adminPage.template')

@section('content')

<!-- Main content -->
@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    <p>{{ $message }}</p>
</div>
@endif
<section class="content">
    <div class="container-fluid">
      <div class="row mb-3">
        <a href="{{ route('kategori.create') }}"><button class="btn-lg btn-warning">Tambah Data</button></a>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr class="text-center">
                  <th>Nama Kategori</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($kategori as $dataKategori )
                  <tr>
                    <td>{{ $dataKategori->namaKategori }}</td>
                    <td style="box-sizing:border-box; display: flex; justify-content: space-around">
                      <a class="btn btn-primary" href="{{ route('kategori.edit', $dataKategori->id) }}">
                        Edit
                      </a>
                      <form method="POST" action="{{ route('kategori.destroy', $dataKategori->id) }}">
                        @csrf
                        @method('DELETE')
                          <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')">Hapus</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection

