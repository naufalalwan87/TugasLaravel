@extends('layout')

@section('content')

<h3 style="margin-top:50px;">DETAIL INFORMASI MAHASISWA : {{ $data->name }}</h3>

<table style="margin-top:30px" class="table table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>PHOTO</th>
            <th>NAMA</th>
            <th>NIM</th>
            <th>ALAMAT</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td><img src="{{ Storage::url($data->photo) }}" alt="{{ Storage::url($data->foto) }}" width="100dp"></td>
        <td>{{ $data->name }}</td>
        <td>{{ $data->nim }}</td>
        <td>{{ $data->address }}</td>
    </tr>
</tbody>

</table>
<a style="margin-top:30px;" href="{{ route('biodata.index') }}" class="btn btn-dark">kembali</a>
@endsection