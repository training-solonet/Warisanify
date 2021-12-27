@extends('adminPage.template')

@section('content')
<div class="container d-flex flex-column mt-5">
    <h1>Form Input</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   
    <form method="POST" action="{{ route('kategori.update', $kategori->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="namaKategori" class="form-label">Nama Kategori</label>
            <input name="namaKategori" type="text" class="form-control" id="namaKategori" value="{{ $kategori->namaKategori }}"
                aria-describedby="emailHelp">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
