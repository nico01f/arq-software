@extends('layouts.main')

@section('title', 'Ficha')

@section('content')
  {{-- {{ dd($paciente) }} --}}

  <div class="x_panel">
    <div class="x_title">
      <h3>      Ficha Paciente : {{ $paciente['name'] }}
      </h3>
    </div>
    <div class="x_content">
      <div class="client-data" style="display:inherit;">
        <h4 class="titles">Datos paciente</h4>
        <div class="form-group">
          <div class="row">
            <div class="col-md-4">
              <div class="labels" for="">Rut</div>
              <div class="input-group">
                <input class="form-control" type="text" readonly value="{{$paciente['rut']}}">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-user"></span>
                </span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="labels" for="">Sexo</div>
              <select class="form-control" id="sexo" readonly>
                <option  value="f" @if ($paciente['sexo'] == "F") selected @endif>Femenino</option>
                  <option value="m" @if ($paciente['sexo'] == "M") selected @endif>Masculino</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <div class="labels" for="">Fecha Nacimiento</div>
                  <div class='input-group date' id='datetimepicker1'>
                    <input type='text'  value="{{$paciente['fec_nac']}}" id="fecha_nacimiento" readonly class="form-control" />
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="labels" for="">Nombre</div>
                  <div class="input-group">
                    <input class="form-control" type="text" readonly id="nombre_paciente" value="{{$paciente['name_2']}}">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-user"></span>
                    </span>
                  </div>

                </div>
                <div class="col-md-6">
                  <div class="labels" for="">Apellidos</div>
                  <div class="input-group">
                    <input class="form-control" readonly type="text" id="apellidos_paciente" value="{{$paciente['apellido_p']." ".$paciente['apellido_m']}}">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-user"></span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="labels" for="">Medico Encargado</div>
                  <div class="input-group">
                    <input class="form-control" readonly type="text" id="apellidos_paciente" value="{{ $medico['nombre'] }}">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-user"></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="antecendentes">
            <div class="row">
              <div class="col-md-12">
                <div class="labels">
                  Antencedentes
                </div>
                <textarea class="form-control" id="antecedente" rows="8" cols="80"></textarea>
              </div>
            </div>
          </div>
          <div class="diagnostico">
            <div class="row">
              <div class="col-md-12">
                <div class="labels">
                  Diagnostico
                </div>
                <textarea class="form-control" id="diagnostico"  rows="8" cols="80"></textarea>
              </div>
            </div>
          </div>
          <div class="procedimiento">
            <div class="row">
              <div class="col-md-12">
                <div class="labels">
                  Procedimiento
                </div>
                <textarea class="form-control" id="procedimiento" rows="8" cols="80"></textarea>
              </div>
            </div>
          </div>
          <div class="medicamentos">
            <div class="row">
              <div class="col-md-12">
                <div class="labels">
                  Medicamentos
                </div>
                <textarea class="form-control"  id="medicamentos" rows="8" cols="80"></textarea>
              </div>
            </div>
          </div>
          <div class="row">

            <div class="col-md-offset-9 col-md-3">
              <div id="hidden-btn" style="display:none;">
                <a href="/ListadoFichas" class="btn btn-dark">Volver</a>
                <a class="btn btn-primary" href="http://190.8.110.120/Epicrisis/pdfFicha?ficha={{$id_ficha}}" target="_blank">Ver Receta</a>
              </div>
              <button role="button" class="btn btn-primary" id="save-btn" name="button">Guardar</button>
            </div>

          </div>
        </div>
      </div>
      <script type="text/javascript">
      $(document).ready(function(){

        $('#save-btn').click(function(e){
          e.preventDefault();

          var id_ficha = {{ $id_ficha }};
          var paciente_id =  {{$paciente['id']}};
          var base_url  = "http://190.8.110.120/";


          var antencedente = $('#antecedente').val();
          var diagnostico = $('#diagnostico').val();
          var procedimiento = $('#procedimiento').val();
          var medicamentos = $('#medicamentos').val();

          $.post( base_url + 'Epicrisis/IngresarDiagnostico' , {
            ficha : id_ficha,
            funcionario : paciente_id,
            antecedente : antencedente,
            procedimiento: diagnostico,
            diagnostico:  procedimiento,
            receta : medicamentos
          },function(response){

            console.log("RESPONSE : ",response);
            if (response.status == true) {
              alert(response.message);
              // window.open(base_url + "Epicrisis/pdfFicha?ficha="+id_ficha,'_blank');

              $('#hidden-btn').show('fade');
              $('#save-btn').hide('fade');

            }

          })
        })
      })
      </script>
    @endsection
