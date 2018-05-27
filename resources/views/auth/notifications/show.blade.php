@extends('layouts.app')

@section('title', 'Noticias')
@section('content')
	<div class="card card-notice mb-4 box-shadow">
		<div class="card-header">				
			<p class="card-title">{{ $notification -> name }}</p>
		</div>		
		<div class="card-body">
			<p class="card-text">{!! $notification -> description !!}</p>			
			<div class="d-flex justify-content-between align-items-center">
				<div class="btn-group">										
					<a href="{{ route('portal.index') }}" class="btn btn-sm btn-info">
						<i class="fa fa-pencil-alt"></i> Atras
						
					</a>					
				</div>
			</div>
		</div>
	</div>
@endsection