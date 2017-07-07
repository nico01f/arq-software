@extends('layouts.main')

@section('title', 'Receta medica')

@section('content')

<div class="x_panel">
  <div class="x_title">
    <h3>Receta medica</h3>
  </div>
  <div class="x_content">
    <div class="form-group">

    <div class="row">
      <div class="col-md-10">
        <div class="labels" for="">Rut</div>
        <div class="input-group">
          <input class="form-control" type="text"  id="rut_paciente" value="">
          <span class="input-group-addon">
              <span class="glyphicon glyphicon-user"></span>
          </span>
        </div>
    </div>
    <div class="col-md-10">
      <div class="labels" for="">Nombre paciente</div>
      <div class="input-group">
          <input class="form-control" type="text"  id="nombre_paciente" value="">
          <span class="input-group-addon">
              <span class="glyphicon glyphicon-user"></span>
          </span>
      </div>
    </div>
    <div class="col-md-10">
      <div class="labels" for="">Telefono</div>
      <div class="input-group">
          <input class="form-control" type="text"  id="telefono_paciente" value="">
          <span class="input-group-addon">
              <span class="glyphicon glyphicon-phone"></span>
          </span>
      </div>

    </div>

    <div class="col-md-10">
      <div class="labels" for="">Edad</div>
      <div class="input-group">
          <input class="form-control" type="number"  id="edad_paciente" value="">
          <span class="input-group-addon">
              <span class="glyphicon glyphicon-user"></span>
          </span>
      </div>

    </div>

    <div class="col-md-10">
      <div class="labels" for="">Receta</div>
      <div class="input-group">
        <textarea class="form-control" id="receta_paciente" rows="5" style="width:300px; height:150px;"></textarea>
      </div>
    </div>

    <div class="col-md-10">
      <div class="labels" for="">Atendido por: </div>
      <div class="input-group">
          <input class="form-control" type="text"  id="atendido_paciente" value="">
          <span class="input-group-addon">
              <span class="glyphicon glyphicon-user"></span>
          </span>
      </div>

    </div>


    </div>

      <button type="submit" class="btn  lg btn-primary">Crear</button>
  </div>


</div>


@endsection
