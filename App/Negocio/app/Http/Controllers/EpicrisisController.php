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

        if (true) {
            $request->session()->put('user',[
                'id'=> 2,
                'area' => 1,
                'nombre' => 'ayuwoki'
            ]);
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

public function getReceta(){
    return view('receta_medica');
}

public function getListadoFichas(){
    return view('listado_fichas_paciente');
}
}
