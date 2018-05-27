@extends('layouts.admin')

@section('title', 'Premios')
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
                <a class="btn btn-primary btn-sm" href="{{ route('awards.create') }}">
                    <i class="fa fa-plus"></i> Nuevo
                </a>
            </div>
			<div class="box-body">
				<table id="datatable" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th style="width: 40px">Id</th>
							<th>Nombre</th>
							<th>Descripción</th>
							<th>Valor (hits)</th>
							<th>Tipo</th>
							<th style="width: 30px">Acciones</th>
						</tr>
					</thead>
					
					<tbody>
						@foreach ($awards as $award)
							<tr>
								<td>{{ $award->id }}</td>
								<td>{{ $award->name }}</td>
								<td>{{ substr($award->description, 0, 80) }}...</td>
								<td>{{ $award->hits }}</td>
								<td>{{ $award->type_id }}</td>
								<td>
									<a href="{{ route('awards.edit', $award->id) }}" class="btn btn-primary btn-xs">
										<i class="fa fa-pencil"></i>
									</a>
									<a href="{{ route('awards.show', $award->id) }}" class="btn btn-success btn-xs">
										<i class="fa fa-eye"></i>
									</a>
									<form style="display: inline;" action="{{ route('awards.destroy', $award->id) }}" method="POST">
										{{ csrf_field() }} 
										{{ method_field('DELETE') }} 
										<button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
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