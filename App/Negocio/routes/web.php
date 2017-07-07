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

Route::get('/', function(){
  return view('welcome');
});

Route::get('auth/login' , [
  "as" => "auth/login",
  "uses" => "EpicrisisController@getLogin"
]);

Route::get('Recepcion' , [
  "as" => "Recepcion",
  "uses" => "EpicrisisController@getRecepcion"
]);

Route::get('ListadoFichas' , [
  "as" => "ListadoFichas",
  "uses" => "EpicrisisController@getListadoFichas"
]);

Route::get('Epicrisis' , [
  "as" => "Epicrisis",
  "uses" => "EpicrisisController@getEpicrisis"
]);

Route::get('receta_medica' , [
  "as" => "receta_medica",
  "uses" => "EpicrisisController@getReceta"
]);
