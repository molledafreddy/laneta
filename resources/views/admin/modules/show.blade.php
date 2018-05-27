@extends('layouts.admin')

@section('title', 'Ver modulo')
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
            <div class="box-header text-right">
                <a href="{{ route('modules.index') }}" class="btn btn-warning btn-sm">
                    <i class="fa fa-arrow-left"></i> Atras
                </a>
            </div>
            <div class="box-body">
                <ul class="products-list product-list-in-box">
                    <li class="item">
                        <div class="row">
                            <div class="col-md-6">
                               <b>Nombre</b> <p>{{ $module -> name }}</p>
                            </div>
                            <div class="col-md-6">                          
                                <b>Username</b> <p>{{ $module -> description }}</p>
                            </div>
                        </div>
                    </li>                         
                </ul>    
            </div>
            <div class="box-footer text-center">                
                <a href="{{ route('modules.edit', $module -> id) }}" class="btn btn-primary btn-sm">
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
           <form action="{{ route('modules.destroy', $module -> id) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="delete">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Eliminar modulo</h4>
                    </div>
                    <div class="modal-body">
                        <p>Está seguro de eliminar este modulo?</p>
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
