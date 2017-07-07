<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Validator;
use DB;

use App\Epicrisis;
use App\Paciente;
use App\Diagnostico;
use App\Antecedente;
use App\Procedimiento;
use App\Receta;

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
          $jsondata['message'] = Auth::user();
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

    public function getListaPacientes(Request $request){
      $validator = Validator::make( $request->all(),
          [
              'area' => 'required'
          ]
      );

      if(!$validator->fails()){
        return Paciente::select('epicrisis.id', DB::raw("CONCAT(paciente.nombre, ' ', paciente.apellidop, ' ',paciente.apellidom) AS nombre"), 'epicrisis.created_at AS fecha')
                        ->join('epicrisis', 'epicrisis.paciente_id', '=', 'paciente.id')
                        ->where('epicrisis.area_id', $request->input('area'))
                        ->where('epicrisis.estado_epicrisis_id', 1)
                        ->get()
                        ->toJson();
      }else{
          $jsondata['status'] = false;
          $jsondata['message'] = str_replace('.','.<br>', $validator->errors()->all());
      }

      return $jsondata;
    }

    public function postAsignar(Request $request){
      $validator = Validator::make( $request->all(),
          [
              'ficha' => 'required',
              'funcionario' =>  'required'
          ]
      );

      if(!$validator->fails()){
        $epicrisis = Epicrisis::find($request->input('ficha'));
        $epicrisis->funcionario_resp_id = $request->input('funcionario');

        if($epicrisis->save()){
            $jsondata['status'] = true;
            $jsondata['message'] = 'Ficha asignada exitosamente.';
        }else{
          $jsondata['status'] = false;
          $jsondata['message'] = 'Ocurrió un problema al asignar la epicrisis, favor reintentar.';
        }
      }else{
          $jsondata['status'] = false;
          $jsondata['message'] = str_replace('.','.<br>', $validator->errors()->all());
      }

      return $jsondata;
    }

    public function postIngresarDiagnostico(Request $request){
      $validator = Validator::make( $request->all(),
          [
              'ficha' => 'required',
              'funcionario' =>  'required'
          ]
      );

      if(!$validator->fails()){
        $cont = 0;

        if($request->has('antecedente')){
          $antecedente = new Antecedente;
          $antecedente->valor = $request->input('antecedente');
          $antecedente->epicrisis_id = $request->input('ficha');
          $antecedente->funcionario_id = $request->input('funcionario');

          if(!$antecedente->save()){
              $jsondata['status'] = false;
              $jsondata['message'] = 'Ocurrió un problema al guardar el antecedente, favor reintentar.';
              return $jsondata;
          }
          $cont++;
        }

        if($request->has('diagnostico')){
          $diagnostico = new Diagnostico;
          $diagnostico->valor = $request->input('diagnostico');
          $diagnostico->epicrisis_id = $request->input('ficha');
          $diagnostico->funcionario_id = $request->input('funcionario');

          if(!$diagnostico->save()){
              $jsondata['status'] = false;
              $jsondata['message'] = 'Ocurrió un problema al guardar el diagnostico, favor reintentar.';
              return $jsondata;
          }
          $cont++;
        }


        if($request->has('procedimiento')){
          $procedimiento = new Procedimiento;
          $procedimiento->valor = $request->input('procedimiento');
          $procedimiento->epicrisis_id = $request->input('ficha');
          $procedimiento->funcionario_id = $request->input('funcionario');

          if(!$procedimiento->save()){
            $jsondata['status'] = false;
            $jsondata['message'] = 'Ocurrió un problema al guardar el procedimiento, favor reintentar.';
            return $jsondata;
          }
          $cont++;
        }


        if($request->has('receta')){
          $receta = new Receta;
          $receta->valor = $request->input('receta');
          $receta->epicrisis_id = $request->input('ficha');
          $receta->funcionario_id = $request->input('funcionario');

          if(!$receta->save()){
            $jsondata['status'] = false;
            $jsondata['message'] = 'Ocurrió un problema al asignar guardar la receta, favor reintentar.';
            return $jsondata;
          }
          $cont++;
        }

        if($cont>0){
          $jsondata['status'] = true;
          $jsondata['message'] = 'Diagnostico ingresado exitosamente.';
        }else{
          $jsondata['status'] = false;
          $jsondata['message'] = 'No existen datos para guardar.';
        }
      }else{
          $jsondata['status'] = false;
          $jsondata['message'] = str_replace('.','.<br>', $validator->errors()->all());
      }

      return $jsondata;
    }
}
