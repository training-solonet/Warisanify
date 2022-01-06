@extends('adminPage.template')

@section('content')

<!-- Main content -->
@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    <p>{{ $message }}</p>
</div>
@endif
<section class="content">
    <div class="container-fluid">
      <div class="row mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Tambah Data
        </button>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                  @foreach ($kategori as $dataKategori )
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $dataKategori->namaKategori }}</td>
                    <td style="box-sizing:border-box; display: flex; justify-content: space-around">
                      <button class="btn btn-primary" onclick="edit({{ $dataKategori->id }})">
                        Edit
                      </button>
                      <form method="POST" action="{{ route('kategori.destroy', $dataKategori->id) }}">
                        @csrf
                        @method('DELETE')
                          <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')">Hapus</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

    {{-- modal --}}
    @include('admin.modal')
  </section>
  <!-- /.content -->

@endsection

@section('script')

<script type="text/javascript">
  var table;
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    function add(){
      $('#form')[0].reset(); // reset form on modals
      $('[name="name"]').val("");
      $('[name="id"]').val("");
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Input Data Sekolah'); // Set Title to Bootstrap modal title
    }

  });


    function save(){
        $.ajax({
            url : "{{ route('ajax.store')}}",
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(reponse){
                if(true){
                  alert('success');
                  $('#exampleModal').modal('hide');
                }
            },
            error: function (jqXHR, textStatus , errorThrown){ 
                alert(errorThrown);
            }
        });
    }

    function edit(id){
            $('#form')[0].reset();

            $.ajax({
              url : "ajax/" + id,
              type: "GET",
              dataType: "JSON",
              success: function(data) {
                console.log(data);
                  $('[name="namaKategori"]').val(data.namaKategori);
                  $('#exampleModal').modal('show'); // show bootstrap modal when complete loaded
              },
              error: function (jqXHR, textStatus , errorThrown) {
                  alert(errorThrown);
              }
            });
        }


</script>
@endsection

