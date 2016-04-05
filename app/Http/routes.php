<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', ['as'=>'index','uses'=>'WelcomeController@index']);

//Route::get('/prueba');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

// Registration routes...
	Route::get('auth/register', 'Auth\AuthController@getRegister');
	Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['middleware'=>'auth'],function(){
	//
	Route::get('home', ['as'=>'home','uses'=>'HomeController@home']);
	Route::get('registro', ['as'=>'registro','uses'=>'HomeController@register']);
	Route::get('ingresos', ['as'=>'ingresos','uses'=>'HomeController@income']);
	Route::get('egresos', ['as'=>'egresos','uses'=>'HomeController@egress']);

	// Authentication routes...
	Route::get('auth/logout', 'Auth\AuthController@getLogout');

	

	//Personas

	Route::get('registro/personas', ['as'=>'personas','uses'=>'PersonController@index']);
	Route::get('registro/crear/personas', ['as'=>'crear-persona','uses'=>'PersonController@create']);
	Route::post('registro/crear/personas', ['as'=>'save-person','uses'=>'PersonController@store']);
	Route::get('registro/listado/personas', ['as'=>'lista-personas','uses'=>'PersonController@listOfPersons']);
	Route::get('registro/editar/persona/{id}', ['as'=>'editar-persona','uses'=>'PersonController@edit']);
	Route::patch('registro/editar/persona/{id}', ['as'=>'update-person','uses'=>'PersonController@update']);
	Route::get('registro/asignar/cuentas/persona/{id}', ['as'=>'asignar-cuentas-persona','uses'=>'PersonController@addAccounts']);
	Route::post('add/account/person/{id}', ['as'=>'add-account-person','uses'=>'PersonController@saveAccount']);
	Route::post('delete/account/person/{id}', ['as'=>'delete-account-person','uses'=>'PersonController@deleteAccount']);
	Route::get('lista/cuentas/asociadas/socio/{id}', ['as'=>'cuentas-asociadas-socio','uses'=>'PersonController@listOfAccounts']);
	Route::get('cartola/ahorro/socio/{id}', ['as'=>'get-cartola','uses'=>'PersonController@getCartola']);

	//Moviles

	Route::get('registro/moviles', ['as'=>'moviles','uses'=>'MovilController@index']);
	Route::get('registro/crear/movil', ['as'=>'crear-movil','uses'=>'MovilController@create']);
	Route::post('registro/crear/movil', ['as'=>'save-movil','uses'=>'MovilController@store']);
	Route::get('registro/lista/moviles', ['as'=>'lista-moviles','uses'=>'MovilController@listOfMovils']);

	//Fondos

	Route::get('registro/fondos', ['as'=>'fondos','uses'=>'FondoController@index']);
	Route::get('registro/crear/fondo', ['as'=>'crear-fondo','uses'=>'FondoController@create']);
	Route::post('registro/crear/fondo', ['as'=>'save-fondo','uses'=>'FondoController@store']);

	//Cuentas

	Route::get('registro/cuenta', ['as'=>'cuentas','uses'=>'AccountController@index']);
	Route::get('registro/crear/cuenta', ['as'=>'crear-cuenta','uses'=>'AccountController@create']);
	Route::post('registro/crear/cuenta', ['as'=>'save-cuenta','uses'=>'AccountController@store']);
	Route::get('registro/listado/cuentas', ['as'=>'listado-cuentas','uses'=>'AccountController@listOfAccounts']);
	Route::get('registro/editar/cuenta/{id}', ['as'=>'editar-cuenta','uses'=>'AccountController@edit']);
	Route::patch('registro/editar/cuenta/{id}', ['as'=>'edita-cuenta','uses'=>'AccountController@update']);

	//Usuarios
	Route::group(['middleware'=>'role:Admin'],function(){
		//
		Route::get('registro/usuarios', ['as'=>'usuarios','uses'=>'UserController@index']);
		Route::get('registro/crear/usuario', ['as'=>'crear-usuario','uses'=>'UserController@create']);
		Route::post('registro/crear/usuario', ['as'=>'save-user','uses'=>'UserController@store']);
		Route::get('registro/lista/usuarios', ['as'=>'lista-usuarios','uses'=>'UserController@listOfUsers']);
	});

	//Ingresos
	//vales
	Route::get('ingresos/vales',['as'=>'vales','uses'=>'VoucherController@create']);

	//ahorro
	Route::get('ingresos/ahorro/voluntario',['as'=>'ahorro-voluntario','uses'=>'SavingController@create']);
	Route::post('ingresos/ahorro/voluntario',['as'=>'save-saving','uses'=>'SavingController@store']);

	//Egresos
	//ahorro
	Route::get('egresos/ahorro/voluntario',['as'=>'ahorro-voluntario-egreso','uses'=>'SavingController@createEgress']);
	Route::post('egresos/ahorro/voluntario',['as'=>'egress-saving','uses'=>'SavingController@store_egress']);
	//prestamos

	//tareas programas
	//agregar deudas diarias
});