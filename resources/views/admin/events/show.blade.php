@extends('layouts.admin')

@section('title', 'Detalle Evento')
@section('content')
    <section class="content-header">
        <h1>
            @yield('title')
            <small>Panel Administrativo</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Panel Administrativo</a></li>
            <li><a href="{{ route('events.index') }}">Eventos</a></li>
            <li class="active">@yield('title')</li>
        </ol>
    </section>

	<section class="content">
		<div class="box box-primary">			
			<div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title">Description Horizontal</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl class="dl-horizontal">
                <dt>Nombre:</dt>
                <dd>{{ $event->name }}</dd>
                <dt>Número de hits:</dt>
                <dd>{{ $event->hits }}</dd>
                <dt>Descripción:</dt>
                <dd>{{ $event->description }}</dd>
              </dl>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('events.index') }}" type="button" class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i> Regresar
                    </a>
                    <a href="{{ route('events.edit', $event->id) }}" type="button" class="btn btn-success">
                        <i class="fa fa-pencil"></i> Editar
                    </a>
                </div>
                <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: inline;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-times"></i> Eliminar
                    </button>
                </form>
            </div>
		</div>
	</section>
@endsection
