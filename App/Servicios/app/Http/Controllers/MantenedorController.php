<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Paciente;
use App\Prevision;
use App\Area;
use App\Funcionario;
use App\Epicrisis;

use Validator;
use DB;
use PDF;

class MantenedorController extends Controller
{
  /*
  |   Pacientes
  */

  public function createPaciente(Request $request){
    if($request->has('rut') && empty(Paciente::where('rut', $request->input('rut'))->get()->toArray())){
      $validator = Validator::make($request->all(),
          [
              'rut' => 'required|unique:paciente,rut',
              'nombre' => 'required',
              'apellido_paterno' => 'required',
              'apellido_materno' => 'required',
              'sexo' => 'required',
              'fecha_nacimiento' => 'required',
              'prevision' => 'required',
              'area' => 'required'
          ]
      );

      if(!$validator->fails()){
        $paciente = new Paciente;
        $paciente->rut = $request->input('rut');
        $paciente->nombre = $request->input('nombre');
        $paciente->apellidop = $request->input('apellido_paterno');
        $paciente->apellidom = $request->input('apellido_materno');
        $paciente->sexo = $request->input('sexo');
        $paciente->fec_nac = $request->input('fecha_nacimiento');
        $paciente->prevision_id = $request->input('prevision');

        if($paciente->save()){
          $area = $request->input('area');
          if(Self::crearEpicrisis($paciente->id, $area)){
            $jsondata['status'] = true;
            $jsondata['message'] = 'Epicrisis agregada exitosamente.';
          }else{
            $jsondata['status'] = false;
            $jsondata['message'] = 'Ocurrió un problema al intentar guardar la epicrisis, favor reintentar.';
          }
        }else{
          $jsondata['status'] = false;
          $jsondata['message'] = 'Ocurrió un problema al intentar guardar el paciente, favor reintentar.';
        }
      }else{
        $jsondata['status'] = false;
        $jsondata['message'] = str_replace('.','.<br>', $validator->errors()->all());
      }
    }else{
      $validator = Validator::make( $request->all(),
          [
              'rut' => 'required',
              'nombre' => 'required',
              'apellido_paterno' => 'required',
              'apellido_materno' => 'required',
              'sexo' => 'required',
              'fecha_nacimiento' => 'required',
              'prevision' => 'required',
              'area' => 'required',
              'paciente_id' => 'required'
          ]
      );

      if(!$validator->fails()){
        $paciente = Paciente::find($request->input('paciente_id'));
        $paciente->nombre = $request->input('nombre');
        $paciente->apellidop = $request->input('apellido_paterno');
        $paciente->apellidom = $request->input('apellido_materno');
        $paciente->sexo = $request->input('sexo');
        $paciente->fec_nac = $request->input('fecha_nacimiento');
        $paciente->prevision_id = $request->input('prevision');

        if($paciente->save()){
          $area = $request->input('area');
          if(Self::crearEpicrisis($paciente->id, $area)){
            $jsondata['status'] = true;
            $jsondata['message'] = 'Epicrisis agregada exitosamente.';
          }else{
            $jsondata['status'] = false;
            $jsondata['message'] = 'Ocurrió un problema al intentar guardar la epicrisis, favor reintentar.';
          }
        }else{
          $jsondata['status'] = false;
          $jsondata['message'] = 'Ocurrió un problema al intentar actualizar el paciente, favor reintentar.';
        }
      }else{
        $jsondata['status'] = false;
        $jsondata['message'] = str_replace('.','.<br>', $validator->errors()->all());
      }
    }

    return $jsondata;
  }

  public function editPaciente(Request $request){
    $validator = Validator::make( $request->all(),
        [
            'paciente_id' => 'required',
            'rut' => 'required',
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'sexo' => 'required',
            'fecha_nacimiento' => 'required',
            'prevision' => 'required'
        ]
    );

    if(!$validator->fails()){
      $paciente = Paciente::find($request->input('paciente_id'));
      $paciente->rut = $request->input('rut');
      $paciente->nombre = $request->input('nombre');
      $paciente->apellidop = $request->input('apellido_paterno');
      $paciente->apellidom = $request->input('apellido_materno');
      $paciente->sexo = $request->input('sexo');
      $paciente->fec_nac = $request->input('fecha_nacimiento');
      $paciente->prevision_id = $request->input('prevision');

      if($paciente->save()){
        $jsondata['status'] = true;
        $jsondata['message'] = 'Paciente actualizado exitosamente.';
      }else{
        $jsondata['status'] = false;
        $jsondata['message'] = 'Ocurrió un problema al intentar actualizar el paciente, favor reintentar.';
      }
    }else{
      $jsondata['status'] = false;
      $jsondata['message'] = str_replace('.','.<br>', $validator->errors()->all());
    }

    return $jsondata;
  }

  public function delPaciente(Request $request){
    $validator = Validator::make( $request->all(),
        [
            'paciente_id' => 'required'
        ]
    );

    if(!$validator->fails()){
      $paciente = Paciente::find($request->input('paciente_id'));
      $paciente->eliminado = 1;

      if($paciente->save()){
        $jsondata['status'] = true;
        $jsondata['message'] = 'Paciente actualizado exitosamente.';
      }else{
        $jsondata['status'] = false;
        $jsondata['message'] = 'Ocurrió un problema al intentar actualizar el paciente, favor reintentar.';
      }
    }else{
      $jsondata['status'] = false;
      $jsondata['message'] = str_replace('.','.<br>', $validator->errors()->all());
    }

    return $jsondata;
  }

  public function jsonPaciente(Request $request){
    $validator = Validator::make( $request->all(),
        [
            'paciente_id' => 'required'
        ]
    );

    if(!$validator->fails()){
      $paciente = Paciente::select('paciente.id', DB::raw('CONCAT(paciente.rut, " - ", paciente.nombre, " ", paciente.apellidom) AS name'), 'rut', 'nombre as name_2', 'apellidop as apellido_p', 'apellidom as apellido_m', 'sexo', 'fec_nac', 'prevision_id', 'prevision.valor as prevision')
                          ->join('prevision', 'prevision.id', '=', 'paciente.prevision_id')
                          ->where('paciente.id', $request->input('paciente_id'))
                          ->get();

      if(isset($paciente)){
        return $paciente->toJson();
      }
    }else{
      return Paciente::select('paciente.id', DB::raw('CONCAT(paciente.rut, " - ", paciente.nombre, " ", paciente.apellidom) AS name'), 'rut', 'nombre as name_2', 'apellidop as apellido_p', 'apellidom as apellido_m', 'sexo', 'fec_nac', 'prevision_id', 'prevision.valor as prevision')
                          ->join('prevision', 'prevision.id', '=', 'paciente.prevision_id')
                          ->get();
    }
  }


    /*
    |   Funcionario
    */

    public function jsonFuncionario(Request $request){
      $validator = Validator::make( $request->all(),
          [
              'area_id' => 'required'
          ]
      );

      if(!$validator->fails()){
        return Funcionario::select('funcionario.id', 'funcionario.nombre', 'funcionario.apellidop', 'funcionario.apellidom')
                          ->join('especialidad', 'especialidad.id', '=', 'funcionario.especialidad_id')
                          ->join('especialidad_area', 'especialidad.id', '=', 'especialidad_area.especialidad_id')
                          ->join('area', 'area.id', '=', 'especialidad_area.area_id')
                          ->distinct()
                          ->where('area.id', $request->input('area_id'))
                          ->get()->toJson();
      }
    }



    /*
    |   Prevision
    */

    public function jsonPrevision(Request $request){
      $validator = Validator::make( $request->all(),
          [
              'prevision_id' => 'required'
          ]
      );

      if(!$validator->fails()){
        $prevision = Prevision::where('id', $request->input('prevision_id'))->get();

        if(isset($prevision)){
          return $prevision->toJson();
        }
      }else{
        return Prevision::All()->toJson();
      }
    }



    /*
    |   Area
    */

    public function jsonArea(Request $request){
      $validator = Validator::make( $request->all(),
          [
              'area_id' => 'required'
          ]
      );

      if(!$validator->fails()){
        $area = Area::where('id', $request->input('area_id'))->get();

        if(isset($area)){
          return $area->toJson();
        }
      }else{
        return Area::All()->toJson();
      }
    }

    public function crearEpicrisis($paciente_id, $area_id){
      \Log::info($area_id);

      $epicrisis = new Epicrisis;
      $epicrisis->paciente_id = $paciente_id;
      $epicrisis->area_id = $area_id;
      $epicrisis->estado_epicrisis_id = 1;
      $epicrisis->funcionario_resp_id = null;
      $epicrisis->funcionario_enf_id = 1;

      if($epicrisis->save()){
        return true;
      }else{
        return false;
      }
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
        $epicrisis = Epicrisis::find($request->input('ficha'));
        $epicrisis->estado_epicrisis_id = 3;
        $epicrisis->save();

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
