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

Route::get('/' , function(){
  return ["status" => true];
});

Route::post('auth/login' , [
  "as" => "Login",
  "uses" => "EpicrisisController@getLogin"
]);

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

Route::get('ListaPacientes' , [
  "as" => "ListaPacientes",
  "uses" => "EpicrisisController@getListaPacientes"
]);

Route::post('AsignarPaciente' , [
  "as" => "AsignarPaciente",
  "uses" => "EpicrisisController@postAsignar"
]);

Route::post('IngresarDiagnostico' , [
  "as" => "IngresarDiagnostico",
  "uses" => "EpicrisisController@postIngresarDiagnostico"
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
