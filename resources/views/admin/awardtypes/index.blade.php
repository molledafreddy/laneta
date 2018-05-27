@extends('layouts.admin')

@section('title', 'Tipos de premio')
@section('styles')
  	<!-- DataTables -->
  	<link rel="stylesheet" href="{{ asset('vendors/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			@yield('title')
			<small>Admin panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Panel Administrativo</a></li>
			<li class="active">@yield('title')</li>
		</ol>
	</section>

	<section class="content">
		<div class="box">
            <div class="box-header text-right">
                <a class="btn btn-primary btn-sm" href="{{ route('awardtypes.create') }}">
                    <i class="fa fa-plus"></i> Nuevo
                </a>
            </div>
			<div class="box-body">
				<table id="datatable" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th style="width: 40px;">Id</th>
							<th>Nombre</th>
							<th>Imágen</th>
							<th style="width: 30px;">Acciones</th>
						</tr>
					</thead>
					
					<tbody>
						@foreach ($awardtypes as $awardtype)
							<tr>
								<td>{{ $awardtype->id }}</td>
								<td>{{ $awardtype->name }}</td>
								<td>
									<div style="
										width: 32px;
										height: 32px;
										border-radius: 7px;
										background-image: url({{ $awardtype->image }});
										background-position: center;
										background-repeat: no-repeat;
										background-size: cover;
										"></div>
								</td>
								<td>
									<a href="{{ route('awardtypes.edit', $awardtype->id) }}" class="btn btn-primary btn-xs">
										<i class="fa fa-pencil"></i>{{-- Edit View --}}
									</a>
									<a href="{{ route('awardtypes.show', $awardtype->id) }}" class="btn btn-success btn-xs">
										<i class="fa fa-eye"></i>{{-- Show View --}}
									</a>
									<form style="display: inline;" action="{{ route('awardtypes.destroy', $awardtype->id) }}" method="POST">
										{{ csrf_field() }} 
										{{ method_field('DELETE') }} {{-- Delete Method --}}
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