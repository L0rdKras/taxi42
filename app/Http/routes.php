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
	Route::get('auth/logout', ['as'=>'logOut','uses'=>'Auth\AuthController@getLogout']);

	//Personas

	Route::get('registro/personas', ['as'=>'personas','uses'=>'PersonController@index']);
	Route::get('registro/crear/personas', ['as'=>'crear-persona','uses'=>'PersonController@create']);
	Route::post('registro/crear/personas', ['as'=>'save-person','uses'=>'PersonController@store']);
	Route::get('registro/listado/personas', ['as'=>'lista-personas','uses'=>'PersonController@listOfPersons']);
	Route::get('registro/editar/persona/{id}', ['as'=>'editar-persona','uses'=>'PersonController@edit']);
	Route::patch('registro/editar/persona/{id}', ['as'=>'update-person','uses'=>'PersonController@update']);
	//Route::get('registro/asignar/cuentas/persona/{id}', ['as'=>'asignar-cuentas-persona','uses'=>'PersonController@addAccounts']);
	//Route::post('add/account/person/{id}', ['as'=>'add-account-person','uses'=>'PersonController@saveAccount']);
	//Route::post('delete/account/person/{id}', ['as'=>'delete-account-person','uses'=>'PersonController@deleteAccount']);
	Route::get('lista/cuentas/asociadas/socio/{id}', ['as'=>'cuentas-asociadas-socio','uses'=>'PersonController@listOfAccounts']);
	Route::get('cartola/ahorro/socio/{id}', ['as'=>'get-cartola','uses'=>'PersonController@getCartola']);
	Route::get('cartola/prestamos/socio/{id}', ['as'=>'get-cartola-loans','uses'=>'PersonController@getLoans']);
	Route::get('data/person/for/pays/{id}',['as'=>'data-person','uses'=>'PersonController@dataForPay']);

	//Moviles

	Route::get('registro/moviles', ['as'=>'moviles','uses'=>'MovilController@index']);
	Route::get('registro/crear/movil', ['as'=>'crear-movil','uses'=>'MovilController@create']);
	Route::post('registro/crear/movil', ['as'=>'save-movil','uses'=>'MovilController@store']);
	Route::get('registro/lista/moviles', ['as'=>'lista-moviles','uses'=>'MovilController@listOfMovils']);
	Route::get('data/pendings/movil/{id}', ['as'=>'pendings-movil','uses'=>'MovilController@debtsMovil']);
	Route::get('data/pendings/movil/day/{id}/{date}', ['as'=>'detail-data-day','uses'=>'MovilController@debtsDayMovil']);

	Route::get('registro/asignar/cuentas/movil/{id}', ['as'=>'asignar-cuentas-movil','uses'=>'MovilController@addAccounts']);
	Route::get('registro/editar/movil/{id}', ['as'=>'editar-movil','uses'=>'MovilController@edit']);
	Route::patch('registro/editar/movil/{id}', ['as'=>'update-movil','uses'=>'MovilController@update']);
	Route::post('add/account/movil/{id}', ['as'=>'add-account-movil','uses'=>'MovilController@saveAccount']);
	Route::post('delete/account/movil/{id}', ['as'=>'delete-account-movil','uses'=>'MovilController@deleteAccount']);
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
	//pago prestamos
	Route::get('ingresos/pago/prestamo',['as'=>'pago-prestamo','uses'=>'LoanController@paying']);
	Route::get('ingresos/realizar/pago/prestamo/{id}',['as'=>'confeccionar-pago','uses'=>'LoanController@showToPay']);
	Route::post('ingresos/realizar/pago/prestamo/{id}',['as'=>'pay-loan','uses'=>'LoanController@payLoan']);
	//Pago cuentas
	Route::get('ingresos/pago/cuentas',['as'=>'pago-cuentas','uses'=>'PayController@create']);
	Route::post('ingreso/pago/cuentas',['as'=>'store-pay-account','uses'=>'PayController@store']);

	//Egresos
	//ahorro
	Route::get('egresos/ahorro/voluntario',['as'=>'ahorro-voluntario-egreso','uses'=>'SavingController@createEgress']);
	Route::post('egresos/ahorro/voluntario',['as'=>'egress-saving','uses'=>'SavingController@store_egress']);
	//prestamos
	Route::get('egresos/prestamo/socio',['as'=>'prestamo-socio','uses'=>'LoanController@create']);
	Route::post('egresos/prestamo/socio',['as'=>'loan-save','uses'=>'LoanController@store']);
	//tareas programas
	//agregar deudas diarias

	Route::get('import/old/data',['as'=>'import-old-data-persons','uses'=>'PersonController@importOldData']);
	Route::get('test/task',['as'=>'prueba-task','uses'=>'ProgramTasks@addDailyAccounts']);

	//Citaciones
	Route::get('disciplina',['as'=>'disciplina','uses'=>'CitationController@index']);
	Route::get('disciplina/citacion',['as'=>'citacion','uses'=>'CitationController@create']);
	Route::post('disciplina/citacion',['as'=>'save-citation','uses'=>'CitationController@store']);
});
