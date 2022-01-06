
@extends('adminPage.modal.template')

@section('modalContent')
        <!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            </div>
            <form method="POST" action="/barang" id="editForm">
            <div class="modal-body">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="namaBarang" class="form-label">Nama Barang</label>
                    <input name="namaBarang" type="text" class="form-control" id="namaBarang"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input name="harga" type="number" step="1"
                        class="form-control" id="harga"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input name="gambar" type="text" class="form-control" id="gambar"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <label for="floatingTextarea2">Detail Produk</label>
                        <textarea value="" name="detailProduk" class="form-control" placeholder="Detail Produk" id="detailProduk" style="height: 100px"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="idKategori" class="form-label">ID Kategori</label>
                    <select name="idKategori" class="form-control"
                        for="idKategori" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        {{-- @foreach ($kategori as $dataKategori)
                            @if ($barang->kategori->id === $dataKategori->id)
                                <option selected value="{{ $dataKategori->id }}">{{ $dataKategori->namaKategori }}</option>
                                @else
                                <option value="{{ $dataKategori->id }}">{{ $dataKategori->namaKategori }}</option>
                            @endif
                        @endforeach --}}
                    </select>
                </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
