@extends('layouts.app')

@section('title', 'Editar noticia')
@section('content')
	<div class="card card-notice card-outline-primary">
	  	<div class="card-header">
	  		<h4 class="card-title">@yield('title')</h4>
	  	</div>
	  	<div class="card-body">			 
		    <form class="form" role="form" action="{{ route('posts.update', $post -> id) }}" method="post">
			  	{{ csrf_field() }}
			  	<input type="hidden" name="_method" value="put">
	    		<div class="form-group">
			    	<label for="title">Titulo </label>
			    	<input class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="Ingrese el Titulo" type="text" value="{{ isset($post) ? $post->title : old('title') }}">
			  	</div>
				<div class="form-group">
				    <label for="description">Descripci&oacute;n</label>
				    <textarea class="form-control" id="description" name="description" aria-describedby="newHelp" placeholder="Ingrese la Noticia" rows="5">{{ isset($post) ? $post->description : old('description') }}</textarea>
			  	</div>
			  	<div class="form-group">
				    <label for="location">Ubicaci&oacute;n</label>
				    <input class="form-control" id="location" name="location" aria-describedby="locationHelp" placeholder="Ingrese la Ubicaci&oacute;n" type="text" value="{{ isset($post) ? $post->location : old('location') }}">
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