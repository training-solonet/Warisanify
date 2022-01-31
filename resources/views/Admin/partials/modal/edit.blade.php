<div class="modal fade" id="produk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="form">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">produk</label>
                <input type="text" name="produk" id="produk" class="form-control" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">foto</label>
                <input type="text" name="foto" id="foto" class="form-control" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">id_kategori</label>
                <input type="text" name="id_kategori" id="id_kategori" class="form-control" aria-describedby="emailHelp">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" onclick="save()" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>
