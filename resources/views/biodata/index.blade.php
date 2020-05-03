@extends('layout')

@section('content')
    <h1>DAFTAR MAHASISWA</h1>
    <a style="float:right" href="{{ route('biodata.create') }}" class="btn btn-info">Tambah</a>
    <table style="margin-top:30px;" class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>NAMA</th>
                <th>NIM</th>
                <th>ALAMAT</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mahasiswa as $data)
                <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->name }}</td>
                <td>{{$data->nim}}</td>
                <td>{{$data->address}}</td>
                <td>
                <a href="{{ route('biodata.show', ['id' => $data->id]) }}" class="btn btn-success">Detail</a>
                <a href="{{ route('biodata.edit', ['id' => $data->id]) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('biodata.destroy', ['id'=> $data->id]) }}" onclick="return confirm('Yakin mau dihapus ?')" class="btn btn-danger">Delete</a>
                </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Data Belum Tersedia!</td>
                </tr>
            @endforelse
        </tbody>
    </table>    
@endsection