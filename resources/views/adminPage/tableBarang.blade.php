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
          <ul class="navbar-nav">
              <li class="nav-item">
                {{-- <a href="{{ route('barang.create') }}"><button class="btn-lg btn-warning">Tambah Data</button></a> --}}
                    <button type="button" class="btn-lg btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Produk
                </button>

              </li>
          </ul>
          <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn-lg btn-danger">
                        logout
                    </button>
                </form>
              </li>
          </ul>

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
                      {{-- <a href="#" class="btn btn-primary btn-edit" data-id="{{ $dataBarang->id }}">
                        <i class="fas fa-edit"></i>
                      </a> --}}
                      <button class="btn btn-primary btn-edit" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="fas fa-edit"></i>
                    </button>
                      <form method="POST" action="{{ route('barang.destroy', $dataBarang->id) }}">
                        @csrf
                        @method('DELETE')
                          <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')"><i class="fas fa-trash"></i></button>
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


    <!-- Modal -->
    @include('adminPage.modal.createModal')
    @include('adminPage.modal.editModal')

  </section>
  <!-- /.content -->

@endsection

