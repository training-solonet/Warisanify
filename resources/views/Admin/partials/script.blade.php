
<script type="text/javascript">

     $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });


    $(document).ready(function() {
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
            {data:"kategori", name:"kategori"},
            {data:"action", name:"action", orderable: false, searchable: false}
        ],
         columnDefs:
            [{
                "targets": 2,
                data: 'foto',
                "render": function (data, type, row, meta) {
                    // return '<img src="' + data + '" alt="' + data + '"height="16" width="16"/>';
                    return "<img src=\"/pict/" + data + "\" height=\"50\"/>";
                }
            }],
        order: [[0, 'asc']]
    });
});

$('#tombol-tambah').click(function () {
            $('#tombol-simpan').val("create-post"); //valuenya menjadi create-post
            $('#id').val(''); //valuenya menjadi kosong
            $('#form').trigger("reset"); //mereset semua input dll didalamnya
            $('#exampleModalLabel').html("Tambah Produk"); //valuenya tambah pegawai baru
            $('#produk_modal').modal('show'); //modal tampil
        });

function save(){
        $('#errors_produk').text('');
        var formData = new FormData($('#form')[0]);
        $.ajax({
            url : "{{ route('produk.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (response){
                if(response.status){
                    alert("Data Saved");
                    var oTable = $('#tbl_example').dataTable();
                    oTable.fnDraw(false); //reset datatable
                    $('#produk_modal').modal('hide')
                }else{
                    if(response.errors.produk){
                        $('#errors_produk').text(response.errors.produk[0]);
                    }
                }
            },
            error: function(error){
                console.log(error)
                alert("Data Not Saved");
            }
        });
    }

    $('body').on('click', '.edit-post', function () {
            $('#errors_produk').text('');
            var data_id = $(this).data('id');
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
