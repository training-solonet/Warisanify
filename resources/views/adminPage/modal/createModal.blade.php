
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <p>{{ $message }}</p>
            </div>
            @endif
    <form method="POST" action="{{ route('barang.store') }}" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="namaBarang" class="form-label">Nama Barang</label>
                <input name="namaBarang" type="text" class="form-control" id="namaBarang" value="{{ old('namaBarang') }}"
                    aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input name="harga" type="number" step="1"
                    value="{{ old('harga') }}" class="form-control" id="harga"
                    aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input name="gambar" type="file" class="form-control" id="gambar"
                    value="{{ old('gambar') }}" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <div class="form-floating">
                    <label for="floatingTextarea2">Detail Produk</label>
                    <textarea name="detailProduk" class="form-control" placeholder="Detail Produk" id="floatingTextarea2" style="height: 100px">{{ old('detailProduk') }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="idKategori" class="form-label">ID Kategori</label>
                <select name="idKategori" class="form-control" value="{{ old('idKategori') }}"
                    for="idKategori" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                @foreach ($kategori as $dataKategori)
                        <option value="{{ $dataKategori->id }}">{{ $dataKategori->namaKategori }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    </div>
  </div>
</div>

