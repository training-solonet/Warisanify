<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModalCategory">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formCategory" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="id">
            <div class="mb-3">
                <label for="" class="form-label">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" aria-describedby="emailHelp">
                <span class="text-danger">
                    <strong id="errors_name"></strong>
                </span>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="saveCategory()" class="btn btn-primary btn-block" id="saveButton" value="create">Enter</button>
      </div>
        </form>
    </div>
  </div>
</div>
