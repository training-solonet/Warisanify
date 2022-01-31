@extends('Admin.index')

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
            <a href="javascript:void(0)" class="mb-3 btn btn-lg btn-info" id="tombol-tambah-kategori">Tambah Produk</a>
            <table id="tbl_kategori" class="table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
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

    @include('Admin.kategori.kategoriCreate')

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
    $('#tbl_kategori').DataTable({
        ordering: false,
        processing: true,
        serverSide: true,
        ajax : {
            url: "{{ route('kategori.index') }}",
            type: "GET",
        },
        columns: [
            {
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
            },
            {data:"nama_kategori", name:"nama_kategori"},
            {data:"action", name:"action", orderable: false, searchable: false}
        ],
        order: [[0, 'asc']]
    });
});

$('#tombol-tambah-kategori').click(function () {
            $('#tombol-simpan').val("create-post"); //valuenya menjadi create-post
            $('#id').val(''); //valuenya menjadi kosong
            $('#form').trigger("reset"); //mereset semua input dll didalamnya
            $('#exampleModalLabel').html("Tambah kategori"); //valuenya tambah pegawai baru
            $('#kategori_modal').modal('show'); //modal tampil
        });

function save(){
        $('#errors_produk').text('');
        var formData = new FormData($('#form')[0]);
            $.ajax({
            url : "{{ route('kategori.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (response){
                console.log(response)
                if(response.status){
                    alert("Data Saved");
                    var oTable = $('#tbl_kategori').dataTable();
                    oTable.fnDraw(false); //reset datatable
                    $('#kategori_modal').modal('hide')
                }else{
                    if(response.errors.produk){
                        $('#errors_produk').text(response.errors.produk[0]);
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
            // $('#errors_produk').text('');
            console.log('hai')
            var data_id = $(this).data('id');
            $.get('kategori/' + data_id + '/edit', function (data) {
                $('#form')[0].reset();
                $('#exampleModalLabel').html("Edit Post");
                $('#tombol-simpan').val("edit-post");
                $('#kategori_modal').modal('show');
                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas
                $('#id').val(data.id);
                $('#nama_kategori').val(data.nama_kategori);
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
                url: "/kategori/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function () {
                    $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
                },
                success: function (data) { //jika sukses
                    setTimeout(function () {
                        $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#tbl_kategori').dataTable();
                        oTable.fnDraw(false); //reset datatable
                    });
                }
            })
        });
</script>

@endsection
