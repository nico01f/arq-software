@extends('layouts.main')

@section('title', 'Recepcion Pacientes')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>Recepcion pacientes</h3>
        </div>
        <div class="panel-body">

            <form class="" autocomplete="off" >
                <div class="form-group search">
                    <h4 class="titles space">Buscar paciente</h4>
                    <div class="row">
                        <div class="col-md-4" >
                            <div class="input-group">
                                <input class="form-control typeahead" type="text" name="buscar" value="">
                                <span class="input-group-addon">
                                    <span onclick="$('.client-data').show('fade');$('.derivacion').show('fade');" class="glyphicon glyphicon-plus"></span>
                                </span>
                            </div>
                        </div>

                        <br>
                    </div>
                </div>
            </form>

            <hr>
            <div class="client-data">
                <h4 class="titles">Datos paciente</h4>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="labels" for="">Rut</div>
                            <div class="input-group">
                                <input class="form-control" type="text" id="rut_paciente" value="">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="labels" for="">Sexo</div>
                            <select class="form-control" id="sexo">
                                <option value="F">Femenino</option>
                                <option value="M">Masculino</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <div class="labels" for="">Fecha Nacimiento</div>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' id="fecha_nacimiento" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="labels" for="">Prevision</div>
                            <select class="form-control" id="prevision">
                                <option value="isapre">Isapre</option>
                                <option value="fonasa">Fonasa</option>
                            </select>
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

            <div class="derivacion">
                <hr>
                <h4 class="titles">Derivacion</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="labels" for="">Area</div>
                        <select class="form-control" id="AreaList" name="">
                            <option value="">Seleccione area </option>
                            <option value="">Kinesiologia</option>
                            <option value="">Cardiologia</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="labels" for="">Medico</div>
                        <select class="form-control" id="FuncList" name="">
                            <option value="">Seleccione  medico</option>                        
                        </select>
                    </div>
                    <button class="btn-submit pull-center" role="submit">Guardar</button>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
