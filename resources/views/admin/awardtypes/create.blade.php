@extends('layouts.admin')

@section('title', 'Crear Tipo de Premio')
@section('content')
	<section class="content-header">
		<h1>
			@yield('title')
			<small>Panel Administrativo</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Panel Administrativo</a></li>
			<li><a href="{{ route('awardtypes.index') }}">Tipos de premio</a></li>
			<li class="active">@yield('title')</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-primary">
			<form role="form" action="{{ route('awardtypes.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="box-body row">
					<div class="col-lg-6 col-md-12">
						<div class="form-group">
							<label for="name">Nombre</label>
							<input type="text" name="name" class="form-control" id="name" placeholder="Ej. 1000 facebook sharings" maxlength="255" required>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="image">Seleccione una imágen</label>
							<input type="file" name="image" id="image" onchange="previewImage();" accept="image/*" required>
							<img id="award_type_image" src="#" height="218" alt="Award type image">
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Enviar</button>
				</div>
			</form>
		</div>
	</section>
	
	<script type="text/javascript">
		
		function previewImage() {
			var oFReader = new FileReader();
			oFReader.readAsDataURL(document.getElementById("image").files[0]);

			oFReader.onload = function (oFREvent) {
				document.getElementById("award_type_image").src = oFREvent.target.result;
			};
		};
		
	</script>
@endsection
