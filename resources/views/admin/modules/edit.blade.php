@extends('layouts.admin')

@section('title', 'Editar modulo')
@section('content')
    <header class="content-header">
        <h1>            
            @yield('title')
            <small>Panel Administrativo</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Panel Administrativo</a></li>
            <li><a href="{{ route('modules.index') }}">Modulos</a></li>
            <li class="active">@yield('title')</li>
        </ol>
    </header>

    <section class="content">
        <div class="box">
            <form action="{{ route('modules.update', $module -> id) }}" method="post">
                <div class="box-header text-right">
                    <a href="{{ route('modules.show', $module -> id) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-arrow-left"></i> Atras
                    </a>
                </div>
                <div class="box-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label for="first_name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="nombre del modulo" required="required" value="{{ $module -> name }}">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="descripcion" required="required" value="{{ $module -> description }}">
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