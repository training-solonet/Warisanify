<div class="modal fade" id="produk_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="form" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="id">
            <div class="mb-3">
                <label for="" class="form-label">produk</label>
                <input type="text" name="produk" id="produk" class="form-control" aria-describedby="emailHelp">
                <span class="text-danger">
                    <strong id="errors_produk"></strong>
                </span>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">foto</label>
                <input type="file" name="foto" id="foto" class="form-control" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">harga</label>
                <input type="number" name="harga" id="harga" class="form-control" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Detail Produk</label>
                {{-- <input type="text" name="detailProduk" id="detailProduk" class="form-control" aria-describedby="emailHelp"> --}}
                <div class="form-floating">
                    <textarea name="detailProduk" id="detailProduk" class="form-control" placeholder="Detail" id="floatingTextarea2" style="height: 180px"></textarea>
                    <label for="floatingTextarea2">Detail</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">kategori</label>
                <select class="form-select" aria-label="Default select example" name="id_kategori" id="id_kategori">
                    <option value="">Pilih Kategori</option>
                    @foreach ($kategori as $key => $item)
                        <option value="{{ $key }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>
      </div>
      <div class="modal-footer">
        {{-- <button type="submit" class="btn btn-primary btn-block" id="tombol-simpan" value="create">Simpan</button> --}}
        <button type="button" onclick="save()" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>
