<div class="modal fade" id="kategori_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="form" method="POST">
            @csrf
            <input type="hidden" name="id" id="id">
            <div class="mb-3">
                <label for="" class="form-label">kategori</label>
                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" aria-describedby="emailHelp">
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
