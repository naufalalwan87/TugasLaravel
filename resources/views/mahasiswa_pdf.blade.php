@extends("layout")

@section("content")

	<table class="table table-striped table-hover text-center" id="myTable">
        <thead>
            <tr>
                <th width="5%">ID</th>
                <th width="15%">NAMA</th>
                <th width="15%">NIM</th>
                <th width="15%">Alamat</th>
                <th width="25%">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mahasiswa as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->nim }}</td>
                    <td>{{ $data->address }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection