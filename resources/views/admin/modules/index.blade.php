@extends('layouts.admin')

@section('title', 'Modulos')
@section('styles')
    <link rel="stylesheet" href="{{ asset('vendors/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
    <header class="content-header">
        <h1>
            @yield('title')
            <small>Panel Administrativo</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Panel Administrativo</a></li>
            <li class="active">@yield('title')</li>
        </ol>
    </header>

    <section class="content">
        <div class="box">
            <div class="box-header text-right">
                <a class="btn btn-primary btn-sm" href="{{ route('modules.create') }}">
                    <i class="fa fa-plus"></i> Nuevo
                </a>
            </div>
            <div class="box-body">
                <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Creado</th>
                            <th>Modificado</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($modules as $element)                            
                        <tr>
                            <td>{{ $element -> id }}</td>
                            <td><a href="{{ route('modules.show', $element -> id) }}">{{ $element -> name }}</a></td>
                            <td>{{ $element -> description }}</td>
                            <td>{{ $element -> created_at }}</td>
                            <td>{{ $element -> updated_at }}</td>                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
@section('scripts')
    <!-- DataTables -->
    <script src="{{ asset('vendors/adminlte/bower_components/datatables.net/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendors/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('js/dataTables_custom.js') }}"></script>
@endsection
