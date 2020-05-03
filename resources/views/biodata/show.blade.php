@extends("layout.app")
@section("content")
		
		<!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0 text-dark">Detail Mahasiswa</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="{{ route('biodata.index') }}">Kelola Mahasiswa</a></li>
	              <li class="breadcrumb-item active">Detail Mahasiswa</li>
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
                        <form>
                        	<div class="form-group row">
                        		<div class="col-sm-1"></div>
							    <label for="staticEmail" class="col-sm-2 col-form-label">ID Mahasiswa</label>
							    <div class="col-sm-9">
							      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{  $data->id }}">
							    </div>

							    <div class="col-sm-1"></div>
							    	<label for="staticEmail" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
								    <div class="col-sm-9">
								      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{  $data->name }}">
							    </div>

							    <div class="col-sm-1"></div>
								    <label for="staticEmail" class="col-sm-2 col-form-label">NIM Mahasiswa</label>
								    <div class="col-sm-9">
								      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{  $data->nim }}">
							    </div>

							    <div class="col-sm-1"></div>
								    <label for="staticEmail" class="col-sm-2 col-form-label">Alamat Mahasiswa</label>
								    <div class="col-sm-9">
								      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{  $data->address }}">
							    </div>

							    <div class="col-sm-1"></div>
								    <label for="staticEmail" class="col-sm-2 col-form-label">File Path</label>
								    <div class="col-sm-9">
								      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{  $data->filePath }}">
							    </div>

							    <div class="col-sm-1"></div>
							    	<label for="staticEmail" class="col-sm-2 col-form-label">Image</label>
								    <div class="col-sm-9">
								      <img src="{{ asset('photo_mhs/'.$data->photo) }}" id="showgambar" style="max-width:300px;max-height:300px;" />
							    </div>

							    <div class="col-sm-1"></div>
							    	<label for="staticEmail" class="col-sm-2 col-form-label"><a href="{{ route('biodata.index')}}" class="btn btn-primary">Kembali</a></label>
								    <div class="col-sm-9">
							    </div>
							 </div>	
                        </form>
                    </div>
                </div>
            </div>
        </section>

@endsection