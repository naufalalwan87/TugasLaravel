@extends("layout.app")

@section('js')
<script type="text/javascript">
      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#inputgambar").change(function () {
        readURL(this);
    });
</script>

@stop


@section("content")

		<!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0 text-dark">Tambah Mahasiswa</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="{{ route('biodata.index') }}">Kelola Mahasiswa</a></li>
	              <li class="breadcrumb-item active">Tambah Mahasiswa</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content-header -->
	
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<form action="{{ route('biodata.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">

							@csrf

							<div class="form-group">
								<label class="control-label">Nama</label>
								<input type="text" name="name" class="form-control" >
							</div>
							<div class="form-group">
								<label class="control-label">NIM</label>
								<input type="text" name="nim" class="form-control" >
							</div>
							<div class="form-group">
								<label class="control-label">Alamat</label>
								<textarea name="address" rows="3" class="form-control"></textarea> 
							</div>
							<div class="form-group">
								<img src="http://placehold.it/100x100" id="showgambar" style="max-width:200px;max-height:200px;float:left;" />
							</div><br><br><br><br><br>

							<div class="form-group">
								<label class="control-label">Foto</label>
								<input type="file" id="inputgambar" name="photo" required="required">
							</div>
							
							<div class="form-group">
								<button class="btn btn-primary" type="submit">Simpan</button>
								<a href="{{ route('biodata.index')}}" class="btn btn-danger">Batal</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>

@endsection