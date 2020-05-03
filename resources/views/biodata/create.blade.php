@extends('layout')


@section('content')
    <form action="{{ route('biodata.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        
        @csrf

    <h1 style="margin-top:30px;">TAMBAH DATA MAHASISWA</h1>

        <div class="form-group" style="margin-top:30px;">
            <label class="control-label">Nama</label>
            <input name="name" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">NIM</label>
            <input name=" nim" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">Alamat</label>
        <textarea name="address" class="form-control" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label class="control-label">Foto</label>
            <input type="file" name="photo" required>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Simpan</button>
            <a href="{{ route('biodata.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
@endsection