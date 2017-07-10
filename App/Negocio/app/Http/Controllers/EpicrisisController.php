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

    public function postLogin(Request $request){
        $validator = Validator::make( $request->all(),
        [
            'rut' => 'required',
            'password' => 'required',
        ]
    );

    if(!$validator->fails()){
        $rut = $request->input('rut');
        $password = $request->input('password');

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"http://190.8.110.120/Epicrisis/auth/login");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"rut=".$rut."&password=".$password);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);
        curl_close ($ch);

        $jsondata = json_decode($server_output,true);


        if ($jsondata['status'] == true) {
            $request->session()->put('user',[
                'id' => $jsondata['message']['id'],
                'rut' => $jsondata['message']['rut'],
                'nombre' => $jsondata['message']['nombre']." ".$jsondata['message']['apellidop']." ".$jsondata['message']['apellidom'],
                'area' => $jsondata['message']['especialidad_id'],
                'tipo' => $jsondata['message']['tipo_funcionario_id']
            ]);
        }else{
            $jsondata['status'] = false;
            $jsondata['message'] = "Ocurrio un problema con el servidor";
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
public function getLogout (Request $request){
    $request->session()->flush();
    return redirect('auth/login');
}

public function getEpicrisis(Request $request , $id_ficha = null , $id_paciente = null){

    $paciente = $this->makeCurlGet("http://190.8.110.120/Epicrisis/JsonPaciente?paciente_id=".$id_paciente);

    return view('ficha_epicrisis' , ['paciente' => $paciente[0], 'medico' => $request->session()->get('user'),'id_ficha' => $id_ficha ]);
}

public function getReceta(){
    return view('receta_medica');
}
public function makeCurlGet($ruta){
    $curl = curl_init();
    // Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $ruta,
        CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    // Close request to clear up some resources
    curl_close($curl);

    $response = json_decode($resp,true);
    return $response;
}
public function getListadoFichas(Request $request){

    try {
        $user = $request->session()->get('user');

        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => "http://190.8.110.120/Epicrisis/ListaPacientes?area=".$user['area'],
            CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ));
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);

        $pacientes = json_decode($resp,true);

    } catch (Exception $e) {
        return $e;
    }

    return view('listado_fichas_paciente',['pacientes' => $pacientes,'user' => $user]);
}

}
