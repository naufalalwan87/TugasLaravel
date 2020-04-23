@extends("layout")

@section("content")
	<ul>
		<li>ID :{{ $data -> id}}</li>
		<li>Nama :{{ $data -> name}}</li>
		<li>Nim : {{ $data -> nim}}</li>
		<li>Alamat : {{ $data -> address}}</li>
		<li>Foto : <img src="{{ Storage::url($data->photo)}}" width="100dp"></li>

	</ul>

	<a href="{{ route('biodata.index')}}">Kembali</a>
@endsection