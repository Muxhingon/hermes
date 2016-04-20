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
  Route::auth();
Route::group(['middleware' => ['web']],function(){

Route::resource('user', 'UserController');


  Route::get('/', 'HomeController@index');
  Route::get('/dashboard', 'HomeController@index');
  Route::get('/nda/general', 'HomeController@NDAgeneral');
  Route::get('/nda/coordinacionAdministrativa', 'HomeController@NDAcadmva');
  Route::get('/nda/contabilidad', 'HomeController@NDAcontabilidad');
  Route::get('/nda/planeacion', 'HomeController@NDAplaneacion');
  Route::get('/nda/control', 'HomeController@NDAcontrol');
  Route::get('/nda/operaciones', 'HomeController@NDAoperaciones');
  Route::get('/nda/facturacion', 'HomeController@NDAfacturacion');
  Route::get('/nda/mensajero', 'HomeController@NDAmensajero');
  Route::get('/nda/intendencia', 'HomeController@NDAintendencia');
  Route::get('/nda/asistente', 'HomeController@NDAasistente');
  Route::get('/TIC/contrato', 'HomeController@TICcontrato');
  Route::get('/TIC/nda', 'HomeController@TICnda');


});
