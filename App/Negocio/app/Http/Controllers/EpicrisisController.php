<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Validator;

use App\Epicrisis;

class EpicrisisController extends Controller
{
    public function getLogin(){
      return view('login');
    }

    public function getRecepcion(){
      return view('recepcion_pacientes');
    }

    public function getEpicrisis(){
      return view('ficha_epicrisis');
    }

    public function getReceta(){
      return view('receta_medica');
    }

    public function getListadoFichas(){
      return view('listado_fichas_paciente');
    }
}
