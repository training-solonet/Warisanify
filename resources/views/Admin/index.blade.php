@extends('Admin.tamplate')

@section('content')
<div class="content">
      <div class="container-fluid">
        <!-- isi content -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- Button trigger modal -->
              <div class="card-body">
                    {{-- <button type="button" id="tombol-tambah" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#produk">
                        <i class="fas fa-plus"></i> Tambah
                    </button> --}}
            {{-- <a href="javascript:void(0)" class="mb-3 btn btn-lg btn-info" id="tombol-tambah">Tambah Produk</a> --}}
            <button class="btn btn-lg btn-info" onclick="tampil()">
                tambah
            </button>
            <table id="tbl_example" class="table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Foto</th>
                        <th>Harga</th>
                        <th>Detail Produk</th>
                        <th>Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        <!-- isi content -->
        </div>
    </div>
  @include('Admin.partials.modal.create')

@endsection
@section('script')

<script type="text/javascript">

     $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });


    $(document).ready(function() {
    // function show() {
    $('#tbl_example').DataTable({
        ordering: false,
        processing: true,
        serverSide: true,
        ajax : {
            url: "{{ route('produk.index') }}",
            type: "GET",
        },
        columns: [
            {
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
            },
            {data:"produk", name:"produk"},
            {data:"foto", name:"foto"},
            {data:"harga", name:"harga"},
            {data:"detailProduk", nama:"detailProduk"},
            {data:"kategori.nama_kategori", name:"kategori.nama_kategori    "},
            {data:"actions", name:"actions", orderable: false, searchable: false}
        ],
         columnDefs:
            [{
                "targets": 2,
                "render": function (data, type, row, meta) {
                    return "<img src=\"/pict/" + data + "\" height=\"50\"/>";
                }
            }],
    });
});

// $('#tombol-tambah').click(function () {
//             $('#errors_produk').text('');
//             $('#tombol-simpan').val("create-post"); //valuenya menjadi create-post
//             $('#id').val(''); //valuenya menjadi kosong
//             $('#form').trigger("reset"); //mereset semua input dll didalamnya
//             $('#exampleModalLabel').html("Tambah Produk"); //valuenya tambah pegawai baru
//             $('#produk_modal').modal('show'); //modal tampil
//         });

function tampil(){
    $('#errors_produk').text('');
    $('#tombol-simpan').val("create-post"); //valuenya menjadi create-post
    $('#id').val(''); //valuenya menjadi kosong
    $('#form').trigger("reset"); //mereset semua input dll didalamnya
    $('#exampleModalLabel').html("Tambah Produk"); //valuenya tambah pegawai baru
    $('#produk_modal').modal('show'); //modal tampil
}

function save(){
        var formData = new FormData($('#form')[0]);
        $.ajax({
            url : "{{ route('produk.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (data){
                if(data.status){
                    alert("Data Saved");
                    var oTable = $('#tbl_example').dataTable();
                    oTable.fnDraw(false); //reset datatable
                    $('#produk_modal').modal('hide')
                }else{
                    if(data.errors.produk){
                        $('#errors_produk').text(data.errors.produk[0]);
                    }
                }
            },
            error: function(error){
                console.log(error);
                alert("Data Not Saved");
            }
        });
    }

    $('body').on('click', '.edit-post', function () {
            $('#errors_produk').text('');
            var data_id = $(this).attr('id');
            $.get('produk/' + data_id + '/edit', function (data) {
                $('#form')[0].reset();
                $('#exampleModalLabel').html("Edit Post");
                $('#tombol-simpan').val("edit-post");
                $('#produk_modal').modal('show');
                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas
                $('#id').val(data.id);
                $('#produk').val(data.produk);
                $('#harga').val(data.harga);
                $('#detailProduk').val(data.detailProduk);
                $('#id_kategori').val(data.id_kategori);
                //$('#foto').val(data.foto);
            })
        });

    //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
        $(document).on('click', '.delete', function () {
            dataId = $(this).attr('id');
            $('#konfirmasi-modal').modal('show');
        });

    //jika tombol hapus pada modal konfirmasi di klik maka
        $('#tombol-hapus').click(function () {
            $.ajax({
                url: "/produk/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function () {
                    $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
                },
                success: function (data) { //jika sukses
                    setTimeout(function () {
                        $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#tbl_example').dataTable();
                        oTable.fnDraw(false); //reset datatable
                    });
                }
            })
        });
</script>

@endsection
