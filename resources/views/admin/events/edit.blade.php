@extends('layouts.admin')

@section('title', 'Editar evento')
@section('content')
    <section class="content-header">
        <h1>
            @yield('title')
            <small>Panel Administrativo</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Panel Administrativo</a></li>
            <li><a href="{{ route('events.index') }}">Eventos</a></li>
            <li class="active">@yield('title')</li>
        </ol>
    </section>

	<section class="content">
		<div class="box box-primary">
			<form role="form" action="{{ route('events.update', $event -> id) }}" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="put">
				<div class="box-body row">
					<div class="col-lg-6 col-md-12">
						<div class="form-group">
							<label for="name">Nombre</label>
							<input type="text" name="name" class="form-control" id="name" placeholder="Ej. compartir enlace..." value="{{ $event -> name }}" maxlength="255" required>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="form-group">
							<label for="hits">Hits</label>
							<input type="text" name="hits" class="form-control" id="hits" placeholder="Puntos que se aportarán" value="{{ $event -> hits }}" required>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="desciption">Descipción</label>
							<textarea name="description" class="form-control" id="desciption" placeholder="Descipción del evento" rows="6" maxlength="255" required>{{ $event -> description }}</textarea>
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
