@extends('layouts.app')

@section('title', 'Mensaje Directo')
@section('content')
	<div class="card card-notice card-outline-primary">
	  	<div class="card-header">
	  		<h4 class="card-title">@yield('title')</h4>
	  	</div>
	  	<div class="card-body">			 
		    <form class="form" role="form" action="{{ route('message.store') }}" method="post">
			  	{{ csrf_field() }}
			  	<div class="col-md-12">
		    		<div class="form-group col-md-4">
				    	<label for="title">Asunto </label>
				    	<input class="form-control" id="subject" name="subject" aria-describedby="subjectHelp" placeholder="Ingrese el asunto" type="text" value="{{ isset($message) ? $message->subject : old('subject') }}">
					    @if ($errors->has('subject'))
				            <span class="help-block">
				                <strong>{{ $errors->first('subjet') }}</strong>
				            </span>
				        @endif
				  	</div>
				  	<div class="form-group col-md-4">
	                    <label for="target" class="control-label">Destinatario <span class="text-danger">*</span></label>
	                    <select id="target" name="target_id" class="form-control" required="required">
	                        <option value="">Seleccione un destinatario...</option> 
	                        @foreach($users as $user)
	                            <option value="{{ $user->id }}">{{ $user -> first_name }}</option> 
	                        @endforeach
	                    </select>
	                </div>
			  	</div>
				<div class="form-group">
				    <label for="description">Contenido</label>
				    <textarea class="form-control" id="content" name="content" aria-describedby="contentHelp" placeholder="Ingrese el contenido" rows="1">{{ isset($message) ? $message->content : old('content') }}</textarea>
				    @if ($errors->has('content'))
			            <span class="help-block">
			                <strong>{{ $errors->first('content') }}</strong>
			            </span>
			        @endif
			  	</div>
			  	<button type="submit" class="btn btn-primary">
		    		<i class="fa fa-save"></i>
		    		Enviar
		    	</button>
		    	<a href="{{ url(Auth::user()->username) }}" class="btn btn-default">Cancelar</a>
		    </form>
		</div>
	</div>
@endsection