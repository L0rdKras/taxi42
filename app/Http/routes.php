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
Route::get('/', ['as'=>'index','uses'=>'HomeController@index']);
Route::get('registro', ['as'=>'registro','uses'=>'HomeController@register']);

//Personas

Route::get('registro/personas', ['as'=>'personas','uses'=>'PersonController@index']);
Route::get('registro/crear/personas', ['as'=>'crear-persona','uses'=>'PersonController@create']);
Route::post('registro/crear/personas', ['as'=>'save-person','uses'=>'PersonController@store']);
Route::get('registro/listado/personas', ['as'=>'lista-personas','uses'=>'PersonController@listOfPersons']);
Route::get('registro/editar/persona/{id}', ['as'=>'editar-persona','uses'=>'PersonController@edit']);
Route::patch('registro/editar/persona/{id}', ['as'=>'update-person','uses'=>'PersonController@update']);
Route::get('registro/asignar/cuentas/persona/{id}', ['as'=>'asignar-cuentas-persona','uses'=>'PersonController@addAccounts']);

//Moviles

Route::get('registro/moviles', ['as'=>'moviles','uses'=>'MovilController@index']);
Route::get('registro/crear/movil', ['as'=>'crear-movil','uses'=>'MovilController@create']);
Route::post('registro/crear/movil', ['as'=>'save-movil','uses'=>'MovilController@store']);

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