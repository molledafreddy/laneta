@extends('layouts.app')

@section('title', 'Perfil de usuario')
@section('content')
	
	<div class="card card-notice card-outline-primary">
		<div class="card-header">
			<h4 class="card-title">@yield('title')</h4>
			<a href="{{ route('profile.edit', [$user->username, $user->id]) }}" class="btn btn-primary">
				<i class="fa fa-edit"></i> Editar
			</a>
		</div>
		<div class="card-body">	
			<ul>
    			<li>
    				<strong>User name:</strong> {{ $user->username }}
    			</li>
				<li>
					<strong>Full name: </strong> {{ $user->first_name }} {{ $user->second_name }} {{ $user->last_name }}
				</li>
    			<li>
    				<strong>Email: </strong> {{ $user->email }}
    			</li>
    			<li>
    				<strong>Género: </strong> {{ $user->gender }}
    			</li>
    			<li>
    				<strong>Biografía: </strong> <br/> {{ $user->biography }}
    			</li>
    			<li>
    				<strong>Imagen: </strong> {{ $user->image }}
    			</li>
				<li>
					<strong>Photo path: </strong> {{ $user->image }}
				</li>
				<li>
					<strong>Nick name: </strong> {{ $user->username }}
				</li>
				<li>
					<strong>Personal phone: </strong> {{ $user->phone }}
				</li>
    			<li>
    				<strong>Estado: </strong> {{ $user->status }}
    			</li>
    			
    			<hr>
    			
    			<li>
    				<strong>Localidad: </strong> {{ $user->location }}
    			</li>
				<li>
					<strong>City: </strong> {{ $user->city }}
				</li>
    			<li>
    				<strong>País: </strong> {{ $user->country_id }}
    			</li>
    			<li>
    				<strong>Ocupación: </strong> {{ $user->job }}
    			</li>
    			<li>
    				<strong>Título: </strong> {{ $user->title }}
    			</li>
    			<li>
    				<strong>Escuela: </strong> {{ $user->school }}
    			</li>
    			<li>
    				<strong>Hobbie: </strong> {{ $user->hobbie }}
    			</li>
    			
    			<hr>
    			
    			<li>
    				<strong>Website: </strong> {{ $user->website }}
    			</li>
    			<li>
    				<strong>Facebook: </strong> {{ $user->facebook }}
    			</li>
    			<li>
    				<strong>Twitter: </strong> {{ $user->twitter }}
    			</li>
    			<li>
    				<strong>Instagram: </strong> {{ $user->instagram }}
    			</li>
			</ul>
		</div>
	</div>
@endsection


{{--
    password ... ¡!
    remember_token ... No
    created_at ... No
    updated_at ... No

 --}}