@extends('layouts.admin')

@section('title', 'Tipo de Premio')
@section('content')
	<section class="content-header">
		<h1>
			@yield('title')
			<small>Panel Administrativo</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Panel Administrativo</a></li>
			<li><a href="{{ route('awardtypes.index') }}">Tipos de premio</a></li>
			<li class="active">@yield('title')</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-primary">
			<div class="box-header">
				
			</div>		
			<div class="box-body row">
				<dl class="dl-horizontal">
					<dt>Nombre:</dt>
					<dd>{{ $award_type->name }}</dd>
					<dt>Imagen:</dt>
					<dd>
						<div style="
							width: 128px;
							height: 128px;
							border-radius: 7px;
							background-image: url({{ $award_type->image }});
							background-position: center;
							background-repeat: no-repeat;
							background-size: cover;
							"></div>
					</dd>
			    </dl>
			</div>
			<div class="box-footer">

			</div>
		</div>
	</section>
@endsection

