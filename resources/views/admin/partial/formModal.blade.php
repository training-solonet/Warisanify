<div class="modal fade" id="product_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <label for="" class="form-label">image</label>
                <input type="file" name="image" id="image" class="form-control" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" aria-describedby="emailHelp">
                <span class="text-danger">
                    <strong id="errors_name"></strong>
                </span>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Regular Price</label>
                <input type="number" name="regular_price" id="regular_price" class="form-control" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Sale Price</label>
                <input type="number" name="sale_price" id="sale_price" class="form-control" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Category</label>
                <select class="form-select" aria-label="Default select example" name="category_id" id="category_id">
                    <option value="" disabled>Select category</option>
                    @foreach ($categories as $category)
                        <option id="category_id" value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <div class="form-floating">
                    <textarea name="description" id="description" class="form-control" placeholder="Detail" id="floatingTextarea2" style="height: 180px"></textarea>
                    <label for="floatingTextarea2">Description</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Stock Status</label>
                <select class="form-select" aria-label="Default select example" name="stock_status" id="category_id">
                    <option value="" disabled>Select Stock Status</option>
                    <option id="stock_status" value="instock">In Stock</option>
                    <option id="stock_status" value="outofstock">Out Of Stock</option> 
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" aria-describedby="emailHelp">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="save()" class="btn btn-primary btn-block" id="saveButton" value="create">Enter</button>
      </div>
        </form>
    </div>
  </div>
</div>