<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Rtuas principales del portal
Route::get('/', 'Portal\IndexController@index')->name('portal.index');
Route::get('/news/{slug}', 'Portal\IndexController@show')->name('portal.show');


Route::get('csrf', function() {
	return view::make('csrf');
});



Route::get('/contacto', 'Portal\IndexController@contact');
  //Route::post('/direct-message', 'API\ChatController@directMessage')->name('direct.message');

// Grupo de rutas accesible solo si se está logueado como "usuario"
Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'Auth\IndexController@index');
    Route::post('/comment/like', 'Auth\CommentController@like')->name('comment.like');
    Route::resource('/posts', 'Auth\PostController', ['only' => ['store', 'edit', 'destroy']]);
    Route::post('comment/like', 'Auth\CommentController@like')->name('comment.like');
    Route::resource('/comment', 'Auth\CommentController'); 
    Route::resource('/notifications', 'Auth\NotificationController'); 
    Route::resource('/my-awards', 'Auth\AwardController', ['only' => ['index']]); 
    Route::get('/chat', 'Auth\IndexController@indexChat')->name('chat.index');
    Route::post('/conectate', 'Auth\ContactController@conectate')->name('connections.conectate');
		
	/*	Crea, lista, muestra y elimina los amigos a los que queremos seguir.
		No se permiten los métodos edit ni update porque no hay nada que 
		editar ni actualizar. Es una tabla pivote. (by Dario)
		*/
	Route::get('/connections', 'Auth\ContactController@index')->name('connections.index');
});

Route::group(['prefix' => 'admin'], function() {
	// Rutas del sistema de login para el panel administrativo
	Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Admin\LoginController@login');
	Route::post('/logout', 'Admin\LoginController@logout')->name('admin.logout');
	Route::post('/password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email ');
	Route::get('/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/reset', 'Admin\ResetPasswordController@reset');
	Route::get('/password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::get('/register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register');
	Route::post('/register', 'Admin\RegisterController@register');

	//Grupo de rutas accesible solo si se está logueado como "administrador"
	Route::group(['middleware' => 'auth:admin'], function() {
		Route::get('/', 'Admin\IndexController@index');
		Route::resource('/users', 'Admin\UsersController');
		Route::resource('/admins', 'Admin\AdminController');
		Route::resource('/events', 'Admin\EventController');
		Route::resource('/modules', 'Admin\ModuleController');
		
		// Rutas del CRUD de premios (by Dario)
		Route::resource('/awards', 'Admin\AwardController');
		
		// Rutas del CRUD de tipos de premios (by Dario)
		Route::resource('/awardtypes', 'Admin\AwardTypeController');
	});

	// Rutas para la vista de los logs del sistema !IMPORTANTE: cuando se pase a la fase de produccion se debe mover esta ruta al grupo de rutas middleware => admin para que sea necesario el inicio de sesion si se desean ver los logs
});
	Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

// Rutas de tipo API para los accesos asincronos con axios
Route::group(['prefix' => 'api'], function() {
	Route::get('/postsApi', 'API\PostController@index', ['only' => ['index', 'show', 'update']] )
		->name('postsApi.index');

	Route::get('/postsApi/{slug}', 'API\PostController@show')
		->name('postsApi.show');
	
	Route::get('/commentsApi/{id}', 'API\CommentController@index')
		->name('commentsApi.index');
	Route::get('/scrollApi/{id}', 'API\PostController@scroll')->name('portal.scroll');

	Route::get('/postsApi/{id}/user', 'API\PostController@postsUser');
	
	Route::group(['middleware' => 'auth'], function() {
		Route::get('/listContact', 'API\ChatController@listChat');
		Route::post('/direct-message', 'API\ChatController@directMessage')->name('direct.message');
		Route::get('/listUsers', 'API\ChatController@list');
		Route::get('/userChatApi/{id}', 'API\ChatController@userChat');
		Route::post('/messageApi/', 'API\ChatController@userChat');
		Route::post('/chat-send-messageApi', 'API\ChatController@store');
		Route::post('/postsApi/{id}/like', 'API\PostController@like');
		Route::resource('/postsApi', 'API\PostController', [
			'except' => ['index','create']
		]);
	
		Route::post('/commentsApi/{id}/like', 'API\CommentController@like')
			->name('commentsApi.like');
	
		Route::resource('/commentsApi', 'API\CommentController', [
			'except' => ['index','create', 'edit']
		]);
	});
});

// Rutas para validar las cuentas luego de ser credas
Route::get('users/verify/{token}', 'Admin\UsersController@verify')->name('verify');
Route::get('users/{user}/resend', 'Admin\UsersController@resend')->name('resend');



// Metodo que contiene las rutas del sistema de autenticación
Auth::routes();
// Ruta que se encarga de rendear todos los perfiles del website
Route::get('/{username}/configuration', 'Portal\ProfileController@show')->name('profile.show');
Route::get('/{username}', 'Portal\ProfileController@profile')->name('profile');
Route::put('/{username}', 'Portal\ProfileController@update')->name('profile.update');
Route::get('/{username}/edit', 'Portal\ProfileController@edit')->name('profile.edit');

