@extends('layouts.main')

@section('title', 'Ficha')

@section('content')
  <div class="x_panel">
    <div class="x_title">
      <h3>      Ficha Paciente : Christian Santa Maria - 17861005-8
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
                <input class="form-control" type="text" id="rut_paciente" value="">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-user"></span>
                </span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="labels" for="">Sexo</div>
              <select class="form-control" id="sexo">
                <option value="f">Femenino</option>
                <option value="m">Masculino</option>
              </select>
            </div>
            <div class="col-md-4">
              <div class="labels" for="">Fecha Nacimiento</div>
              <div class='input-group date' id='datetimepicker1'>
                <input type='text' id="fecha_nacimiento" class="form-control" />
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
                <input class="form-control" type="text" id="nombre_paciente" value="">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-user"></span>
                </span>
              </div>

            </div>
            <div class="col-md-6">
              <div class="labels" for="">Apellidos</div>
              <div class="input-group">
                <input class="form-control" type="text" id="apellidos_paciente" value="">
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
            <textarea class="form-control" name="name" rows="8" cols="80"></textarea>
          </div>
        </div>
      </div>
      <div class="diagnostico">
        <div class="row">
          <div class="col-md-12">
            <div class="labels">
              Diagnostico
            </div>
            <textarea class="form-control" name="name" rows="8" cols="80"></textarea>
          </div>
        </div>
      </div>
      <div class="procedimiento">
        <div class="row">
          <div class="col-md-12">
            <div class="labels">
              Procedimiento
            </div>
            <textarea class="form-control" name="name" rows="8" cols="80"></textarea>
          </div>
        </div>
      </div>
      <div class="medicamentos">
        <div class="row">
          <div class="col-md-12">
            <div class="labels">
              Medicamentos
            </div>
            <textarea class="form-control" name="name" rows="8" cols="80"></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
