@extends('layouts.admin')

@section('title', 'Crear modulo')
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
            <form action="{{ route('modules.store') }}" method="post">
                {{ csrf_field() }}
                <div class="box-header text-right">
                    <a href="{{ route('modules.index') }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-arrow-left"></i> Atras
                    </a>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Indique el nombre" required="required">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion</label>
                        <input  type="textarea" class="form-control " id="description" name="description" placeholder="Indique la descripcion" required="required">
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