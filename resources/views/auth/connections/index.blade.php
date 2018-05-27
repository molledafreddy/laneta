@extends('layouts.app')

@section('title', 'Contactos')
@section('content')
	<div class="card card-notice">
		<div class="card-header">
			@yield('title')
		</div>
		<div class="card-body">
			<ul class="list-group">
				@foreach ($book -> contacts as $element)
					<li class="list-group-item">
						<a href="{{ url( $element-> user -> username ) }}">
							<img class="user-image" src="{{ $element -> user -> image}}" alt="{{ $element -> user -> first_name}}">							
								<span>{{ $element -> user -> first_name . ' ' . $element -> user -> last_name}}</span>
						</a>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
@endsection