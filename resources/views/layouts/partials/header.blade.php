
	<header class="main-header">
		<!-- Logo -->
		<a href="/" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b>LN</b>2.0</span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b>La Neta</b> 2.0</span>
		</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>

			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<!-- Notifications: style can be found in dropdown.less -->
					<li class="dropdown notifications-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-bell-o"></i>
							<span class="label label-warning">10</span>
						</a>
						<ul class="dropdown-menu">
							<li class="header">You have 10 notifications</li>
							<li>
								<!-- inner menu: contains the actual data -->
								<ul class="menu">
									<li>
										<a href="#">
											<i class="fa fa-users text-aqua"></i> 5 new members joined today
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
											page and may cause design problems
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-users text-red"></i> 5 new members joined
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-shopping-cart text-green"></i> 25 sales made
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-user text-red"></i> You changed your username
										</a>
									</li>
								</ul>
							</li>
							<li class="footer"><a href="#">View all</a></li>
						</ul>
					</li>
					<!-- User Account: style can be found in dropdown.less -->
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="{!! isset(Auth::user() -> image) ? Auth::user() -> image : asset('dist/img/user2-160x160.jpg') !!}" class="user-image" alt="User Image">
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								<img src="{!! isset(Auth::user() -> image) ? Auth::user() -> image : asset('dist/img/user2-160x160.jpg') !!}" class="img-circle" alt="User Image">

								<p>
									{{ Auth::user() -> first_name . ' ' . Auth::user() -> last_name }}
									<small>Miembro desde {{ Auth::user() -> created_at }}</small>
								</p>
							</li>
							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left">
									<a href="#" class="btn btn-default btn-flat">Perfil</a>
								</div>
								<div class="pull-right">
									<form method="POST" action="{{ route('admin.logout') }}">
										{{ csrf_field() }}
										<input type="submit" class="btn btn-default btn-flat" value="Salir" />
									</form>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>