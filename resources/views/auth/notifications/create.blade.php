@extends('layouts.app')

@section('title', 'Creaci&oacute;n de Noticia')
@section('content')
	<div class="card card-notice card-outline-primary">
	  	<div class="card-header">
	  		<h4 class="card-title">@yield('title')</h4>
	  	</div>
	  	<div class="card-body">			 
		    <form class="form" role="form" action="{{ route('posts.store') }}" method="post">
			  	{{ csrf_field() }}
	    		<div class="form-group">
			    	<label for="title">Titulo </label>
			    	<input class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="Ingrese el Titulo" type="text" value="{{ isset($post) ? $post->title : old('title') }}">
				    @if ($errors->has('title'))
			            <span class="help-block">
			                <strong>{{ $errors->first('title') }}</strong>
			            </span>
			        @endif
			  	</div>
				<div class="form-group">
				    <label for="description">Descripci&oacute;n</label>
				    <textarea class="form-control" id="description" name="description" aria-describedby="descriptionHelp" placeholder="Ingrese la Noticia" rows="5">{{ isset($post) ? $post->description : old('description') }}</textarea>
				    @if ($errors->has('description'))
			            <span class="help-block">
			                <strong>{{ $errors->first('description') }}</strong>
			            </span>
			        @endif
			  	</div>
			  	<div class="form-group">
				    <label for="location">Ubicaci&oacute;n</label>
				    <input class="form-control" id="location" name="location" aria-describedby="locationHelp" placeholder="Ingrese la Ubicaci&oacute;n" type="text" value="{{ isset($post) ? $post->location : old('location') }}">
				    @if ($errors->has('location'))
			            <span class="help-block">
			                <strong>{{ $errors->first('location') }}</strong>
			            </span>
			        @endif
			  	</div>
		    	<button type="submit" class="btn btn-primary">
		    		<i class="fa fa-save"></i>
		    		Guardar
		    	</button>
		    	<a href="{{ url(Auth::user()->username) }}" class="btn btn-default">Cancelar</a>
		    </form>
		</div>
	</div>
@endsection