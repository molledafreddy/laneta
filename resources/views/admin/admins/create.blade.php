@extends('layouts.admin')

@section('title', 'Crear administrador')
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
            <form action="{{ route('admins.store') }}" method="post">
                {{ csrf_field() }}
                <div class="box-header text-right">
                    <a href="{{ route('admins.index') }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-arrow-left"></i> Atras
                    </a>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="first_name">Nombre</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Indique su nombre" required="required">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Indique su apellido" required="required">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Indique su nombre de usuario" required="required">
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Indique su correo electronico" required="required">
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="number" class="form-control" id="phone" name="phone" placeholder="Indique su numero teléfonico">
                    </div>
                    <div class="form-group">
                        <label for="job_title">Cargo</label>
                        <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Indique el cargo">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Escriba su contraseña" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="status">Estatus</label>
                        <select class="form-control" id="status" name="status" required="required">
                            <option value="0">Inactivo</option>
                            <option value="1">Activo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gender">Genero</label>
                        <select class="form-control" id="gender" name="gender" required="required">
                            <option value="0">Femenino</option>
                            <option value="1">Masculino</option>
                        </select>
                    </div> 
                    <div class="form-group">
                            <label for="" class="control-label">Modulo <span class="text-danger">*</span></label>
                            @if(count($modules)>0)
                                @foreach($modules as $module)
                                        <input id="{{ $module -> name }}" name="modules[]" type="checkbox"  value="{{ $module -> id }}">
                                        <label class="text-capitalize label left label-primary" for="{{ $module -> name }}"> {{ $module -> name }}</label>
                                @endforeach
                            @else
                                    <p class="text-danger" >No hay modulos registrados</p>
                                    <p>Si desea registrar un Modulo puede hacer click <a href="{{ route('modules.create') }}">aquí</a></p>
                            @endif
                        </div>                  
                </div>
                <div class="box-footer text-center">                
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-save"></i> Guardar
                    </button>
                </div>            
            </form>  
        </div>
    </section>
<!-- /.content-wrapper -->
@endsection