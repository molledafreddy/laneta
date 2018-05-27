
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Iniciar sesión</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Correo electronico">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control" name="password" required placeholder="Contrasña">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="text-right">
                    <div class="checkbox">
                        <label for="remember">
                            <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="text-right">
                        <a class="btn btn-link color-gray" href="{{ route('password.request') }}">
                            Olvidó su contraseña?
                        </a>
                        <button type="submit" class="btn btn-dark">
                            <i class="icon dripicons-enter"></i>  Entrar
                        </button>
                    </div>
                </div>
            </form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade bd-example-modal-lg" id="register" tabindex="-1" role="dialog" aria-labelledby="registerLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Registrar</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">				
				<form class="form-horizontal" method="post" action="{{ route('register') }}">
                {{ csrf_field() }}

	            <div class="row">
	            	<div class="col-md-6 form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus placeholder="Nombre">

                        @if ($errors->has('first_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
	                </div>

	                <div class="col-md-6 form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus placeholder="Apellido">

                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
	                </div>
	            </div>


	            <div class="row">
	            	 <div class="col-md-6 form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <input id="username" type="text" class="form-control" name="username" value="{{ old('last_name') }}" required autofocus placeholder="Username">

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
	                </div>

	                <div class="col-md-6 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Correo electronico">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
	                </div>
	            </div>

	            <div class="row">
	            	<div class="col-md-6 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" name="password" required placeholder="Contraseña">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
	                </div>

	                <div class="col-md-6 form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Repetir contraseña">
	                </div>
	            </div>

                <div class="form-group text-right">
                    <div class=" col-md-offset-4">
                        <button type="submit" class="btn btn-dark">
                            <i class="icon dripicons-checkmark"></i>
                            Registrar
                        </button>
                    </div>
                </div>
            </form>
            
			</div>
		</div>
	</div>
</div>

<div class="modal fade bd-example-modal-lg" id="createPost" tabindex="-1" role="dialog" aria-labelledby="createPostLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
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
				  		<label for="media">Media</label>
				  		<select id="media" name="media" class="form-control">
				  			<option src="P">Imagen</option>
				  		</select>
				  	</div>

				  	<div class="form-group">
				  		<label for="media">Imagen</label>
				  		<div class="file-loading">
				            <input type="file" name="imagen" id="imagen" class="form-control"  multiple=true data-preview-file-type="any"/>
				            @if ($errors->has('imagen'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('imagen') }}</strong>
				                </span>
				            @endif
				        </div>
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

					<div class="text-right">
				    	<button type="submit" class="btn btn-dark btn-xs">
				    		<i class="icon dripicons-checkmark"></i>
				    		Publicar
				    	</button>
					</div>
			    </form>
			</div>
		</div>
	</div>
</div>