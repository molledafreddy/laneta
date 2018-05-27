
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark box-shadow">
	<a class="navbar-brand " href="{{ url('/') }}">
		<img src="{{ asset('img/neta.png') }}" alt="LA NETA" title="Inicio" />
	</a>
	<div class="ml-auto" >
		<ul class="nav navbar-nav ml-auto">
			@if (Auth::check())
				<li>
					<a class="nav-item nav-link my-2" href="{{ route('chat.index') }}">
						<i class="fas fa-comments" style="font-size: 20px"></i>						
					</a>
				</li>
			@endif
			<li>
				<button type="button" class="btn btn-menu" data-toggle="modal" data-target="#createPost">
					<i class="icon dripicons-plus"></i>
				</button>
			</li>
			<li class="nav-item dropdown">
				@if (Auth::check())
					<a class="nav-link dropdown-toggle my-2 nav-item " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">				
	              		<i class="icon dripicons-bell color-white"></i>
	              		@if (!empty($count_notifications))
	              			<span class="badge badge-warning notification-count">{{$count_notifications}}</span>
	              		@endif
					</a>
					<div class="dropdown-menu dropdown-left" aria-labelledby="navbarDropdown">
						@if (!empty($notifications))
							<a class="dropdown-item" href="#">Tienes @if (!empty($count_notifications)){{$count_notifications}}@endif Notificaciones</a>
							@foreach ($notifications as $element)
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{ route('notifications.show', $element -> id) }}"  title="Ver">
									{{$element->name}}
						       	</a>							
							@endforeach
						@else
							<a class="dropdown-item" href="#">No tienes notificaciones</a>						
						@endif						
					</div>	
				@endif
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					@if (Auth::check())
						<img class="user-image" src="{!! Auth::user()->image !!}" class="user-image" alt="User Image">
					@else
						<img class="user-image" src="{{ asset('img/user.svg') }}" class="user-image" alt="User Image">
					@endif
				</a>
				<div class="dropdown-menu dropdown-left bg-dark text-center" aria-labelledby="navbarDropdown">
					@if (Auth::check())
						<a class="dropdown-item" title="Perfil" href="{{ route('profile', Auth::user()->username) }}">
							<span class="icon dripicons-user color-white"></span>
						</a>
						<a class="dropdown-item" title="Premios" href="{{ route('my-awards.index') }}">
							<i class="icon dripicons-trophy color-white"></i>
						</a>
						<a class="dropdown-item" title="Amigos" href="{{ route('connections.index') }}">
							<i class="icon dripicons-user-id color-white"></i>
						</a>
						<a class="dropdown-item" title="Inbox" href="{{ route('chat.index') }}">
							<i class="icon dripicons-inbox color-white"></i>
						</a>
						<a class="dropdown-item" title="Salir" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" title="Salir">
							<i class="icon dripicons-exit color-white"></i>
						</a>
					@else
						<button class="dropdown-item" title="Iniciar Sesión" data-toggle="modal" data-target="#login">
							<i class="icon dripicons-enter color-white"></i> 
						</button>
						<button class="dropdown-item" title="Registrarme" data-toggle="modal" data-target="#register">
							<i class="icon dripicons-document-edit color-white"></i> 
						</button> 
					@endif
				</div>
			</li>			
		</ul>
		<form id="frm-logout" action="{{ route('logout') }}" method="post" style="display: none;">
		    {{ csrf_field() }}
		</form>		
	</div>
</nav>
