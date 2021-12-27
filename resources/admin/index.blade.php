@extends('template')

@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="float-left">
                <h2>Daftar Produk</h2>
            </div>
            <div class="float-right mb-5">
                <a href="{{ route('produk.create') }}" class="btn btn-success">Tambah Buku</a>
            </div>
        </div>
    </div>


@if ($message = Session::get('success'))
    <div class="alert alert-success" role=>
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered" id="myTable">
    <thead>
    <tr>
        <th>Name</th>
        <th>Alamat</th>
        <th>No Telepon</th>
        <th>Tanggal Lahir</th>
        <th width="200px" class="text-center">Aksi</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($pengarang as $dataPengarang)
    <tr>    
        <td class="text-center"><a href="/pengarang/{{ $dataPengarang->id }}">{{ $dataPengarang->nama }}</a></td>
        <td class="text-center">{{ $dataPengarang->alamat }}</td>
        <td class="text-center">{{ $dataPengarang->no_telp }}</td>
        <td class="text-center">{{ $dataPengarang->tgl_lahir }}</td>
        <td class="text-center">
            <form method="POST" action="{{ route('pengarang.destroy', $dataPengarang->id) }}">
                <a href="{{ route('pengarang.edit', $dataPengarang->id) }}" class="btn btn-primary btn-sm">Edit</a>
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin?')">
                    Delete
                </button>
            </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection