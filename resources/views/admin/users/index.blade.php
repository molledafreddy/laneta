@extends('layouts.admin')

@section('title', 'Usuarios')
@section('styles')
	<!-- DataTables -->
	<link rel="stylesheet" href="{{ asset('vendors/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			@yield('title')
			<small>Panel Administrativo</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Panel Administrativo</a></li>
			<li class="active">@yield('title')</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="box">
			<div class="box-body">
				<table id="datatable" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th>Username</th>
							<th>Correo</th>
							<th>Creado</th>
							<th>Modificado</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($users as $element)                            
						<tr>
							<td>{{ $element -> id }}</td>
							<td><a href="{{ route('users.show', $element -> id) }}">{{ $element -> first_name . ' ' . $element -> last_name }}</a></td>
							<td>{{ $element -> username }}</td>
							<td>{{ $element -> email }}</td>
							<td>{{ $element -> created_at }}</td>
							<td>{{ $element -> updated_at }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section>
<!-- /.content-wrapper -->
@endsection
@section('scripts')
	<!-- DataTables -->
	<script src="{{ asset('vendors/adminlte/bower_components/datatables.net/js/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('vendors/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.js') }}"></script>
	<script src="{{ asset('js/dataTables_custom.js') }}"></script>
@endsection
