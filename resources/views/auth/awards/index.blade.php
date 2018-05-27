@extends('layouts.app')
@section('title', 'Premios')
@section('content')
	@foreach ($awards_array as $awards_types)
		<div>
			<h3 class="text-capitalize">{{ $awards_types -> name }}</h3>
			<hr class="mb-4">
			<ul class="list-unstyled row">
				@foreach ($awards_types -> awards as $element)
					<li class="col-md-4" 
						@if(Auth::user()->hits < $element -> hits) style="opacity: 0.5" @endif
					>
						<div class="card card-notice mb-4 box-shadow">
							<div class="card-header">
								<strong>{{ $element -> name }}</strong>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-9">{{ $element -> description }}</div>
									<div class="text-center col-md-3">
										<img width="40" src="{{ asset('img/awards/' . $awards_types -> image) }}" alt="{{ $element -> name }}">
									</div>
								</div>
							</div>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	@endforeach
@endsection