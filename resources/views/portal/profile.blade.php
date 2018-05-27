@extends('layouts.app')

@section('title', 'Noticias')
@section('content')
	<div class="card card-notice card-outline-primary mb-4">
		<div class="card-body">	
			<div class="row" style="position: relative;">
				<img style="position: absolute; top: 10px; left: 10px;" class="profile-image" src="{{ asset($user -> image) }}" alt="User photo">
				<div style="padding-left: 120px; padding-right: 50px">			
	                <h4 class="card-title">{{ $user -> first_name . ' ' . $user -> last_name }}</h4>
	                <small class="text-mute">{{ $user -> biography }}</small>	
				</div>	

				@if (Auth::check() && (Auth::user() -> username == $user -> username))
                	<button type="button" class="btn btn-gray" data-toggle="modal" data-target="#showProfile" style="position: absolute; top: 10px; right: 10px">
					  	<i class="icon dripicons-toggles"></i>
					</button>
                @endif
			</div>
	        <div class="row text-center mt-4">
     		   	<div class="col-xs-12 col-sm-4">
                    <i class="icon dripicons-graph-bar"></i><br>
                    <small class="text-mute">{{ $user -> hits / 20 }}</small>
                </div>
     		   	<div class="col-xs-12 col-sm-4">
                    <i class="icon dripicons-document-new"></i><br>
                    <small class="text-mute">{{ count($user -> posts) }}</small>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <i class="icon dripicons-jewel"></i><br>
                    <small class="text-mute">{{ $user -> hits }}</small>
                </div>
			</div>
			@if (Auth::check() && (Auth::user()->username != $user->username))
		        <hr>
				<div class="row text-center">
					<div class="col-6">
						<button class="btn btn-gray" data-toggle="modal" data-target="#directMessage">
							<i class="icon dripicons-mail"></i>
						</button>
					</div>
					<div class="col-6">
						<form action="{{ route('connections.conectate') }}" method="post">
							{{ csrf_field() }}
							<input type="hidden" name="contact" value="{{ $user->id }}" required="required">
							<button type="submit" class="btn {{ ($is_friend) ? 'btn-red' : 'btn-gray' }}" title="Seguir">
								<i class="icon dripicons-plus"></i>
							</button>
						</form>
					</div>
				</div>
			@endif
		</div>
	</div>
	@php
	if(Auth::check()){ 
		$auth_user = Auth::user();
		$auth = 1; 
	}else{  
		$auth_user = '';
		$auth = 0; 
	}
	@endphp


    <posts  
        :url="'{{ $url }}'" 
        :app_url="'{{ env('APP_URL') }}'"
        :auth="'{{ $auth }}'"
        :auth_user="'{{ $auth_user }}'"
    ></posts>
@endsection
@section('modals')
<!-- Modal -->
<div class="modal fade  bd-example-modal-lg" id="showProfile" tabindex="-1" role="dialog" aria-labelledby="showProfileLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content ">
			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Configuración</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<ul class="list-unstyled">
    			<li class="row">
    				<div class="col-md-6">
    					<strong>User name:</strong> {{ $user->username }}
    				</div>
					<div class="col-md-6">
						<strong>Full name: </strong> {{ $user->first_name }} {{ $user->second_name }} {{ $user->last_name }}
					</div>
				</li>
    			<li class="row">
    				<div class="col-md-6">
    					<strong>Email: </strong> {{ $user->email }}
    				</div>
    				<div class="col-md-6">
    					<strong>Género: </strong> {{ $user->gender }}
    				</div>    				
    			</li>
    			<li class="row">
    				<div class="col-md-6">
	    				<strong>Biografía: </strong> <br/> {{ $user->biography }}
	    			</div>
    				<div class="col-md-6">
    					<strong>Imagen: </strong> {{ $user->image }}
    				</div>
    				
    			</li>
				<li class="row">
					<div class="col-md-6">
						<strong>Photo path: </strong> {{ $user->image }}
					</div>
					<div class="col-md-6">
						<strong>Nick name: </strong> {{ $user->username }}
					</div>
					
				</li>
				<li class="row">
					<div class="col-md-6">
						<strong>Personal phone: </strong> {{ $user->phone }}
					</div>
					<div class="col-md-6">
	    				<strong>Estado: </strong> {{ $user->status }}
	    			</div>
					
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
			<div class="modal-footer">
				<a href="{{ route('profile.edit', $user -> username) }}" class="btn btn-dark btn-sm"><i class="far fa-edit"></i> Editar</a>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="directMessage" tabindex="-1" role="dialog" aria-labelledby="directMessage" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Mensaje</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form" role="form" action="{{ route('direct.message') }}" method="post">
				  	{{ csrf_field() }}
		    		<div class="form-group">
		    			<strong>Para:</strong> {{ $user->username }}
				    	<input id="receive_id" name="receive_id" type="hidden"  value="{{ $user -> id }}">
				  	</div>
					<div class="form-group">
					    <label for="content">Contenido</label>
					    <textarea class="form-control" id="content" required="required" name="content" aria-describedby="contentHelp" placeholder="Escribe el mensaje..." rows="5"></textarea>
					    @if ($errors->has('content'))
				            <span class="help-block">
				                <strong>{{ $errors->first('content') }}</strong>
				            </span>
				        @endif
				  	</div>
				  	<div class="text-right">
				    	<button type="submit" class="btn btn-dark btn-xs">
				    		<i class="icon dripicons-checkmark"></i>
				    		Enviar
				    	</button>
					</div>
			    </form>
			</div>
		</div>
	</div>
</div>
@endsection