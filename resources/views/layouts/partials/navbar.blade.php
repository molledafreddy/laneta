
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left image">
					<img style="height: 45px; width: 45px;" src="{!! isset(Auth::user() -> image) ? Auth::user() -> image : asset('dist/img/user2-160x160.jpg') !!}" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p>{{ Auth::user() -> first_name . ' ' . Auth::user() -> last_name }}</p>
					<span style="font-size: 9pt;"><i class="fa fa-circle text-success"></i> En linea</span>
				</div>
			</div>
			<!-- /.search form -->
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu">
				<li class="header">Menú: @yield('title')</li>
				<li class="treeview {!! Request::is('admin')  ? 'active' : '' !!}">
					<a href="{{ url('/admin') }}">
						<i class="fa fa-dashboard"></i> 
						<span>Dashboard</span>
					</a>
				</li>
				<li class="treeview {!! Request::is('admin/users') || Request::is('admin/users/*')  ? 'active' : '' !!}">
					<a href="{{ url('admin/users') }}">
						<i class="fa fa-users"></i>
						<span>Usuarios</span>
						{{-- <span class="pull-right-container">
							<span class="label label-primary pull-right">4</span>
						</span> --}}
					</a>{{-- 
					<ul class="treeview-menu">
						<li><a href="/admin/users"><i class="fa fa-users"></i> Users list</a></li>
						<li><a href="#"><i class="fa fa-archive"></i> User profiles</a></li>
						<li><a href="#"><i class="fa fa-user-secret"></i> User privileges</a></li>
						<li><a href="/admin/user/types"><i class="fa fa-male"></i> User types</a></li>
					</ul> --}}
				</li>
				<li class="treeview {!! Request::is('admin/admins') || Request::is('admin/admins/*')  ? 'active' : '' !!}">
					<a href="{{ url('admin/admins') }}">
						<i class="fa fa-user-secret"></i>
						<span>Administradores</span>
					</a>
				</li>
				<li class="treeview {!! Request::is('admin/events') || Request::is('admin/events/*')  ? 'active' : '' !!}">
					<a href="{{ url('admin/events') }}">
						<i class="fa fa-table"></i>
						<span>Eventos</span>
					</a>
				</li>
				<li class="treeview {!! Request::is('admin/awards') || Request::is('admin/awards/*')  ? 'active' : '' !!}">
					<a href="{{ url('admin/awards') }}">
						<i class="fa fa-trophy"></i>
						<span>Premios</span>
					</a>
				</li>
				<li class="treeview {!! Request::is('admin/awardtypes') || Request::is('admin/awardtypes/*')  ? 'active' : '' !!}">
					<a href="{{ url('admin/awardtypes') }}">
						<i class="fa fa-cogs"></i>
						<span>Tipos de premio</span>
					</a>
				</li>
				<li class="treeview {!! Request::is('admin/modules') || Request::is('admin/modules/*')  ? 'active' : '' !!}">
					<a href="{{ url('admin/modules') }}">
						<i class="fa fa-cubes"></i>
						<span>Modulos</span>
					</a>
				</li>
			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>
