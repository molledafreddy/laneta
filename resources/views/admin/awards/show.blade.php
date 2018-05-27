@extends('layouts.admin')

@section('title', 'Premio')
@section('content')
	<section class="content-header">
		<h1>
			@yield('title')
			<small>Panel Administrativo</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Panel Administrativo</a></li>sa
			<li><a href="{{ route('awards.index') }}">Premios</a></li>
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
					<dd>{{ $award->name }}</dd>
					<dt>Descripción:</dt>
					<dd>{{ $award->description }}</dd>
					<dt>Valor (hits):</dt>
					<dd>{{ $award->hits }}</dd>
					<dt>Tipo:</dt>
					<dd>{{ $award_type->id }} | {{ $award_type->name }} | {{ $award_type->image }}</dd>
			    </dl>
			</div>
			<div class="box-footer">

			</div>
		</div>
	</section>
@endsection

