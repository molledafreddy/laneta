@extends('layouts.admin')

@section('title', 'Crear Premio')
@section('content')
	<section class="content-header">
		<h1>
			@yield('title')
			<small>Panel Administrativo</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Panel Administrativo</a></li>
			<li><a href="{{ route('awards.index') }}">Premios</a></li>
			<li class="active">@yield('title')</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-primary">
			<form role="form" action="{{ route('awards.update', $award->id) }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="box-body row">
					<div class="col-lg-6 col-md-12">
						<div class="form-group">
							<label for="name">Nombre</label>
							<input type="text" name="name" class="form-control" id="name" value="{{ $award->name }}" maxlength="255" required>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="desciption">Descipción</label>
							<textarea name="description" class="form-control" id="desciption" maxlength="300" required>{{ $award->description }}</textarea>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="form-group">
							<label for="hits">Hits</label>
							<input type="number" name="hits" class="form-control" id="hits" value="{{ $award->hits }}" required>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="form-group">
							<label for="hits">Tipo</label>
							<select class="form-control select2" style="width: 100%;" name="type_id" required>
								@foreach ($award_types as $award_type)
									@if($award_type->id == $award->type_id)
										<option value="{{ $award_type->id }}" selected>{{ $award_type->name }}</option>
									@else
										<option value="{{ $award_type->id }}">{{ $award_type->name }}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Enviar</button>
				</div>
			</form>
		</div>
	</section>
@endsection
