@extends("layout")
@push("style")
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endpush
@section("content")
	<h1>Daftar Mahasiswa</h1>
	<a href="{{route('biodata.create')}}">Add Data</a>
	<a href="{{route('biodata.export')}}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
	{!!$html->table()!!}
@endsection
@push("script")
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    {!! $html->scripts() !!}
@endpush
