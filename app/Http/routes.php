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

Route::get('/', function () {
    return view('welcome');
});

Route::get('registro', function () {
    return view('home.registro');
});

//Personas

Route::get('registro/personas', ['as'=>'personas','uses'=>'PersonController@index']);
Route::get('registro/crear/personas', ['as'=>'crear-persona','uses'=>'PersonController@create']);
Route::post('registro/crear/personas', ['as'=>'save-person','uses'=>'PersonController@store']);

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