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