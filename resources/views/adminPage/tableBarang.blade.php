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
        <a href="{{ route('barang.create') }}"><button class="btn-lg btn-warning">Tambah Data</button></a>
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
                <tr>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Gambar</th>
                  <th>Detail Produk</th>
                  <th>Kategori</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  
                  @foreach ($barang as $dataBarang )
                  <tr>
                    <td>{{ $dataBarang->namaBarang }}</td>
                    <td>{{ $dataBarang->harga }}</td>
                    <td><img width="150px" src="{{ url('pict/'.$dataBarang->gambar) }}"></td>
                    <td>{{ $dataBarang->detailProduk }}</td>
                    <td>{{ $dataBarang->kategori->namaKategori }}</td>
                    <td style="box-sizing:border-box; display: flex">
                      <a class="btn btn-primary" href="{{ route('barang.edit', $dataBarang->id) }}">
                        Edit
                      </a>
                      <form method="POST" action="{{ route('barang.destroy', $dataBarang->id) }}">
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

