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

Route::get('/', [
  "as" => "Recepcion",
  "uses" => "EpicrisisController@getRecepcion"
]);

Route::get('ficha_epicrisis' , [
  "as" => "Epicrisis",
  "uses" => "EpicrisisController@getEpicrisis"
]);

Route::post('auth/login' , [
  "as" => "Login",
  "uses" => "EpicrisisController@getLogin"
]);

Route::get('/login' , function(){
  return view('login');
});

Route::post('CreatePaciente' , [
  "as" => "CreatePaciente",
  "uses" => "MantenedorController@createPaciente"
]);

Route::post('EditPaciente' , [
  "as" => "EditPaciente",
  "uses" => "MantenedorController@editPaciente"
]);

Route::post('DelPaciente' , [
  "as" => "DelPaciente",
  "uses" => "MantenedorController@delPaciente"
]);

Route::match(["get", "post"], 'JsonPaciente' , [
  "as" => "JsonPaciente",
  "uses" => "MantenedorController@jsonPaciente"
]);


Route::match(["get", "post"], 'JsonPrevision' , [
  "as" => "JsonPrevision",
  "uses" => "MantenedorController@jsonPrevision"
]);


Route::match(["get", "post"], 'JsonArea' , [
  "as" => "JsonArea",
  "uses" => "MantenedorController@jsonArea"
]);


Route::match(["get", "post"], 'JsonFuncionario' , [
  "as" => "JsonFuncionario",
  "uses" => "MantenedorController@jsonFuncionario"
]);
