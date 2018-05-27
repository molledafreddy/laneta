@extends('layouts.app')

@section('title', 'Edición del perfil de uruario')
@section('content')
	
	<div class="card card-notice card-outline-primary">
		<div class="card-header">
			<h4 class="card-title">@yield('title')</h4>
		</div>
		<div class="card-body">	
				 
			<form class="form" role="form" action="{{ route('profile.update', [$user->username, $user->id]) }}" method="POST">
				
				{{ csrf_field() }}
				
				{{ method_field('PUT') }}
				
				<div class="form-group">
					<label for="first_name">Primer nombre:</label>
					<input type="text" class="form-control" name="first_name" id="first_name" value="{{ $user->first_name }}">
					
					@if ($errors->has('first_name'))
						<span><strong>{{ $errors->first('first_name') }}</strong></span>
					@endif
				</div>
			
				<div class="form-group">
					<label for="second_name">Segundo nombre:</label>
					<input type="text" class="form-control" name="second_name" id="second_name" value="{{ $user->second_name }}">
					
					@if ($errors->has('second_name'))
						<span><strong>{{ $errors->first('second_name') }}</strong></span>
					@endif
				</div>
				
				<div class="form-group">
					<label for="last_name">Apellido:</label>
					<input type="text" class="form-control" name="last_name" id="last_name" value="{{ $user->last_name }}">
					
					@if ($errors->has('last_name'))
						<span><strong>{{ $errors->first('last_name') }}</strong></span>
					@endif
				</div>
				
				<div class="form-group">
					<label for="biography">Breve biografía:</label>
					<input type="text" class="form-control" name="biography" id="biography" value="{{ $user->biography }}">
					
					@if ($errors->has('biography'))
						<span><strong>{{ $errors->first('biography') }}</strong></span>
					@endif
				</div>
				
				<div class="form-group">
					<label for="image">Foto de perfil</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input" name="image" id="image" value="{{ $user->image }}">
						<label class="custom-file-label" for="image">Choose file</label>
					</div>
				</div>
				
				<div class="form-group">
					<label for="username">Nombre de usuario:</label>
					<input type="text" class="form-control" name="username" id="username" value="{{ $user->username }}">
					
					@if ($errors->has('username'))
						<span><strong>{{ $errors->first('username') }}</strong></span>
					@endif
				</div>
				
				<div class="form-group">
					<label for="email">Correo:</label>
					<input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
					
					@if ($errors->has('email'))
						<span><strong>{{ $errors->first('email') }}</strong></span>
					@endif
				</div>
				
				<div class="form-group">
					<label for="gender">Género:</label>
					<input type="text" class="form-control" name="gender" id="gender" value="{{ $user->gender }}">
					
					@if ($errors->has('gender'))
						<span><strong>{{ $errors->first('gender') }}</strong></span>
					@endif
				</div>
				
				<div class="form-group">
					<label for="phone">Teléfono personal:</label>
					<input type="phone" class="form-control" name="phone" id="phone" value="{{ $user->phone }}">
					
					@if ($errors->has('phone'))
						<span><strong>{{ $errors->first('phone') }}</strong></span>
					@endif
				</div>
				
				<div class="form-group">
					<label for="city">Ciudad:</label>
					<input type="text" class="form-control" name="city" id="city" value="{{ $user->city }}">
					
					@if ($errors->has('city'))
						<span><strong>{{ $errors->first('city') }}</strong></span>
					@endif
				</div>
				
				<div class="form-group">
					<label for="location">Localidad:</label>
					<input type="text" class="form-control" name="location" id="location" value="{{ $user->location }}">
					
					@if ($errors->has('location'))
						<span><strong>{{ $errors->first('location') }}</strong></span>
					@endif
				</div>
				
				<div class="form-group">
					<label for="status">Estado:</label>
					<input type="text" class="form-control" name="status" id="status" value="{{ $user->status }}">
					
					@if ($errors->has('status'))
						<span><strong>{{ $errors->first('status') }}</strong></span>
					@endif
				</div>
				
				<div class="form-group">
					<label for="job">Ocupación:</label>
					<input type="text" class="form-control" name="job" id="job" value="{{ $user->job }}">
					
					@if ($errors->has('job'))
						<span><strong>{{ $errors->first('job') }}</strong></span>
					@endif
				</div>
				
				<div class="form-group">
					<label for="title">Título:</label>
					<input type="text" class="form-control" name="title" id="title" value="{{ $user->title }}">
					
					@if ($errors->has('title'))
						<span><strong>{{ $errors->first('title') }}</strong></span>
					@endif
				</div>
				
				<div class="form-group">
					<label for="school">Escuela:</label>
					<input type="text" class="form-control" name="school" id="school" value="{{ $user->school }}">
					
					@if ($errors->has('school'))
						<span><strong>{{ $errors->first('school') }}</strong></span>
					@endif
				</div>
				
				<div class="form-group">
					<label for="hobbie">Hobbie:</label>
					<input type="text" class="form-control" name="hobbie" id="hobbie" value="{{ $user->hobbie }}">
					
					@if ($errors->has('hobbie'))
						<span><strong>{{ $errors->first('hobbie') }}</strong></span>
					@endif
				</div>
				
				<div class="form-group">
					<label for="website">Web site:</label>
					<input type="text" class="form-control" name="website" id="website" value="{{ $user->website }}">
					
					@if ($errors->has('website'))
						<span><strong>{{ $errors->first('website') }}</strong></span>
					@endif
				</div>
				
				<div class="form-group">
					<label for="facebook">Facebook:</label>
					<input type="text" class="form-control" name="facebook" id="facebook" value="{{ $user->facebook }}">
					
					@if ($errors->has('facebook'))
						<span><strong>{{ $errors->first('facebook') }}</strong></span>
					@endif
				</div>
				
				<div class="form-group">
					<label for="instagram">Instagram:</label>
					<input type="text" class="form-control" name="instagram" id="instagram" value="{{ $user->instagram }}">
					
					@if ($errors->has('instagram'))
						<span><strong>{{ $errors->first('instagram') }}</strong></span>
					@endif
				</div>
				
				<div class="form-group">
					<label for="twitter">Twitter:</label>
					<input type="text" class="form-control" name="twitter" id="twitter" value="{{ $user->twitter }}">
					
					@if ($errors->has('twitter'))
						<span><strong>{{ $errors->first('twitter') }}</strong></span>
					@endif
				</div>
				
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-save"></i>
					Actualizar
				</button>
				<a href="{{ url(Auth::user()->username) }}" class="btn btn-default">Cancelar</a>
			</form>
			
		</div>
	</div>
@endsection