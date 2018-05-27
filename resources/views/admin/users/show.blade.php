@extends('layouts.admin')

@section('title', 'Ver usuario')
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
            <li><a href="{{ route('users.index') }}">Usuarios</a></li>
            <li class="active">@yield('title')</li>
        </ol>
    </section>

   <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header text-right">
                <a href="{{ route('users.index') }}" class="btn btn-warning btn-sm">
                    <i class="fa fa-arrow-left"></i> Atras
                </a>
            </div>
            <div class="box-body">
                <ul class="products-list product-list-in-box">
                        <li class="item">
                            <div class="row">
                                <div class="col-md-12">
                                   <b>Nombre:</b> <p>{{ $user -> first_name . ' ' . $user -> last_name }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="item ">
                            <div class="row">
                                <div class="col-md-6">                          
                                    <b>Username:</b> <p>{{ $user -> username }}</p>
                                </div>
                                <div class="col-md-6">
                                    <b>E-Mail:</b> <p>{{ $user -> email }}</p>
                                </div>
                            </div>
                        </li>             
                        <li class="item ">
                            <div class="row">
                                <div class="col-md-6">                          
                                    <b>Genero:</b> <p>@if($user -> gender == 1) <span class="label label-primary">Masculino</span> @else <span class="label label-warning">Femenino</span> @endif</p>
                                </div>
                                <div class="col-md-6">                          
                                    <b>Estatus:</b> <p>@if($user -> status == 1) <span class="label label-success">Activo</span> @else <span class="label label-danger">Inactivo</span> @endif</p>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="row">
                                <div class="col-md-6">                          
                                    <b>Fecha de registro:</b> <p>{{ $user -> created_at }}</p>
                                </div>
                                <div class="col-md-6">                          
                                    <b>Locatización:</b> <p>@if(empty($user -> location)) <span class="label label-danger">N/P</span> @else {{ $user -> location }} @endif</p>
                                </div>
                            </div>
                        </li>   
                    </ul>    
            </div>
            <div class="box-footer text-center">     
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#destroy">
                    <i class="fa fa-close"></i> Eliminar
                </button>
            </div>
        </div>
    </section>
<!-- /.content-wrapper -->
@endsection
@section('modals')
    <div class="modal fade" id="destroy" tabindex="-1" role="dialog" aria-labelledby="destroyLabel">
        <div class="modal-dialog">
           <form action="{{ route('users.destroy', $user -> id) }}" method="post">
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
