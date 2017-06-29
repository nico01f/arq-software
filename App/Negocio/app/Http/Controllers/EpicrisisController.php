<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Validator;

use App\Epicrisis;

class EpicrisisController extends Controller
{
    public function getLogin(Request $request){
      $validator = Validator::make( $request->all(),
          [
              'rut' => 'required',
              'password' => 'required',
          ]
      );

      if(!$validator->fails()){
        $rut = $request->input('rut');
        $password = $request->input('password');

        if (Auth::attempt(['rut' => $rut, 'password' => $password])) {
          $jsondata['status'] = true;
          $jsondata['message'] = '';
        }else{
          $jsondata['status'] = false;
          $jsondata['message'] = 'Usuario o contraseña incorrectos.';
        }
      }else{
        $jsondata['status'] = false;
        $jsondata['message'] = str_replace('.','.<br>', $validator->errors()->all());
      }
      return $jsondata;
    }

    public function getRecepcion(){
      return view('recepcion_pacientes');
    }

    public function getEpicrisis(){
      return view('ficha_epicrisis');
    }

    public function getListaPacientes(Request $request){
      //return Paciente::select('id_epicrisis', 'nombre weon', 'fecha')
                      //->join('', '', '', '');
    }
}
