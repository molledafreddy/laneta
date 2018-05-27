@extends('layouts.admin')

@section('title', 'Eventos')
@section('styles')
  	<!-- DataTables -->
  	<link rel="stylesheet" href="{{ asset('vendors/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
    <section class="content-header">
        <h1>
            @yield('title')
            <small>Panel Administrativo</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Panel Administrativo</a></li>
            <li class="active">@yield('title')</li>
        </ol>
    </section>

	<section class="content">
		<div class="box">
            <div class="box-header text-right">
                <a class="btn btn-primary btn-sm" href="{{ route('events.create') }}">
                    <i class="fa fa-plus"></i> Nuevo
                </a>
            </div>
			<div class="box-body">
				<table id="datatable" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th style="width: 40px">Id</th>
							<th>Evento</th>
							<th>Valor(hits)</th>
							<th>Creado</th>
							<th>Modificado</th>
							<th style="width: 30px">Acciones</th>
						</tr>
					</thead>
					
					<tbody>
						@foreach ($events as $element)
							<tr>
								<td>{{ $element -> id }}</td>
								<td>{{ $element -> name }}</td>
								<td>{{ $element -> hits }}</td>
								<td>{{ $element -> created_at }}</td>
								<td>{{ $element -> updated_at }}</td>
								<td>
									<a href="{{ route('events.edit', $element->id) }}" class="btn btn-primary btn-xs">
										<i class="fa fa-pencil"></i>
									</a>
									<a href="{{ route('events.show', $element -> id) }}" class="btn btn-success btn-xs">
										<i class="fa fa-eye"></i>
									</a>
									<form action="{{ route('events.destroy', $element -> id) }}" 
										  method="POST"
										  style="display: inline;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button type="submit" class="btn btn-danger btn-xs">
											<i class="fa fa-times"></i>
										</button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section>
@endsection
@section('scripts')
	<!-- DataTables -->
	<script src="{{ asset('vendors/adminlte/bower_components/datatables.net/js/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('vendors/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('js/dataTables_custom.js') }}"></script>
@endsection
