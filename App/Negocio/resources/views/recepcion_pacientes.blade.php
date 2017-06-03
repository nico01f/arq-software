@extends('layouts.main')

@section('title', 'Recepcion Pacientes')

@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">Recepcion pacientes</div>
        <div class="panel-body">
            <form class="" action="index.html" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="rut">Rut paciente</label>
                            <input class="form-control typeahead" type="text" name="rut" value="">
                        </div>
                        <div class="col-md-8">
                            <label for="rut">Rut paciente</label>
                            <input class="form-control" type="text" name="rut" value="">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
