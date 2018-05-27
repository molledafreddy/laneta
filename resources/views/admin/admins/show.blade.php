@extends('layouts.admin')

@section('title', 'Ver administrador')
@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
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
            <li><a href="{{ route('admins.index') }}">Administradores</a></li>
            <li class="active">@yield('title')</li>
        </ol>
    </section>

   <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header text-right">
                <a href="{{ route('admins.index') }}" class="btn btn-warning btn-sm">
                    <i class="fa fa-arrow-left"></i> Atras
                </a>
            </div>
            <div class="box-body">
                <ul class="products-list product-list-in-box">
                        <li class="item">
                            <div class="row">
                                <div class="col-md-6">
                                   <b>Nombre</b> <p>{{ $admin -> first_name . ' ' . $admin -> last_name }}</p>
                                </div>
                                <div class="col-md-6">                          
                                    <b>Username</b> <p>{{ $admin -> username }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="item ">
                            <div class="row">
                                <div class="col-md-4">
                                    <b>E-Mail</b> <p>{{ $admin -> email }}</p>
                                </div>
                                <div class="col-md-4">
                                    <b>Teléfono</b> <p>{{ $admin -> phone }}</p>
                                </div>
                                <div class="col-md-4">
                                    <b>Cargo</b> <p>{{ $admin -> job_title }}</p>
                                </div>
                            </div>
                        </li>             
                        <li class="item ">
                            <div class="row">
                                <div class="col-md-6">                          
                                    <b>Genero</b> <p>@if($admin -> gender == 1) <span class="label label-primary">Masculino</span> @else <span class="label label-warning">Femenino</span> @endif</p>
                                </div>
                                <div class="col-md-6">                          
                                    <b>Estatus</b> <p>@if($admin -> status == 1) <span class="label label-success">Activo</span> @else <span class="label label-danger">Inactivo</span> @endif</p>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="row">
                                <div class="col-md-6">                          
                                    <b>Fecha de registro</b> <p>{{ $admin -> created_at }}</p>
                                </div>
                                <div class="col-md-6">                          
                                    <b>Fecha de modificación</b> <p>{{ $admin -> updated_at }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <p><b>Modulos</b></p>
                            @if(count($admin_modules)>0)
                                @foreach($admin_modules as $datos) 
                                    <p class="text-capitalize label left label-primary">{{ $datos->module-> name }}</p>
                                @endforeach
                            @else
                                <p class="text-danger">Este usuario no esta asociado a ningun modulo</p>
                            @endif
                        </li>   
                    </ul>    
            </div>
            <div class="box-footer text-center">                
                <a href="{{ route('admins.edit', $admin -> id) }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil"></i> Editar
                </a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#destroy">
                    <i class="fa fa-close"></i> Eliminar
                </button>
            </div>
        </div>
    </section>
<!-- /.content-wrapper -->
@endsection
@section('modals')
    <div class="modal fade" id="destroy">
        <div class="modal-dialog">
           <form action="{{ route('admins.destroy', $admin -> id) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="delete">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Eliminar usuario</h4>
                    </div>
                    <div class="modal-body">
                        <p>Está seguro de eliminar este usuario?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </div>
           </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
