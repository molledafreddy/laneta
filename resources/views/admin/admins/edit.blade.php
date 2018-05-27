@extends('layouts.admin')

@section('title', 'Editar administrador')
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
            <form action="{{ route('admins.update', $admin -> id) }}" method="post">
                <div class="box-header text-right">
                    <a href="{{ route('admins.show', $admin -> id) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-arrow-left"></i> Atras
                    </a>
                </div>
                <div class="box-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label for="first_name">Nombre</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Indique su nombre" required="required" value="{{ $admin -> first_name }}">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Indique su apellido" required="required" value="{{ $admin -> last_name }}">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Indique su nombre de usuario" required="required" value="{{ $admin -> username }}">
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Indique su correo electronico" required="required" value="{{ $admin -> email }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="number" class="form-control" id="phone" name="phone" placeholder="Indique su numero teléfonico" value="{{ $admin -> phone }}">
                    </div>
                    <div class="form-group">
                        <label for="job_title">Cargo</label>
                        <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Indique el cargo" value="{{ $admin -> job_title }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Estatus</label>
                        <select class="form-control" id="status" name="status" required="required">
                            <option value="0" {!! ($admin -> status == 0) ? 'selected="selected"' : '' !!}>Inactivo</option>
                            <option value="1" {!! ($admin -> status == 1) ? 'selected="selected"' : '' !!}>Activo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gender">Genero</label>
                        <select class="form-control" id="gender" name="gender" required="required">
                            <option value="0" {!! ($admin -> gender == 0) ? 'selected="selected"' : '' !!}>Femenino</option>
                            <option value="1" {!! ($admin -> gender == 1) ? 'selected="selected"' : '' !!}>Masculino</option>
                        </select>
                    </div>
                    <div class="form-group">
                            <label for="club" class="control-label">Modulos <span class="text-danger">*</span></label>
                            @if(count($modules)>0)
                                @if (count($modules_end)>0)
                                    @php $i=0; @endphp
                                    @foreach($modules_end as $module)
                                        <input id="{{ $module['id'] }}" name="modules[]" type="checkbox" value="{{ $module['id'] }}" @if ($module['module_check']=='on') checked="checked" @endif>
                                        <label class="text-capitalize label left label-primary" for="{{ $module['id'] }}">{{ $module['name'] }}</label>
                                        @php $i++; @endphp
                                    @endforeach
                                @else
                                    @foreach($modules as $module)
                                      <input id="{{ $module['id'] }}" name="modules[]" type="checkbox" value="{{ $module['id'] }}">
                                      <label class="text-capitalize label left label-primary" for="{{ $module['id'] }}">{{ $module['name'] }}</label>  
                                    @endforeach
                                @endif
                            @else
                                <p style="color:red;" >No hay modulos registrados</p>
                                <p>Si desea registrar un modulo puede hacer click <a href="{{ route('modules.create') }}">aquí</a></p>
                            @endif
                        </div>
                </div>
                <div class="box-footer text-center">                
                    <button  class="btn btn-primary btn-sm">
                        <i class="fa fa-save"></i> Guardar
                    </button>
                </div>            
            </form>  
        </div>
    </section>
<!-- /.content-wrapper -->
@endsection