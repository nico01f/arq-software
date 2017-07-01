@extends('layouts.main')

@section('title', 'Recepcion Pacientes')

@section('content')
    <div class="x_panel">
        <div class="x_title">
            <h3>Listado ficha pacientes</h3>
        </div>
        <div class="x_content">
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Paciente</th>
                <th class="text-center">Fecha Ingreso</th>
                <th class="text-center">Opciones</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center">1</td>
                <td class="text-center">Christian santa maria</td>
                <td class="text-center">2016/03/09</td>
                <td class="text-center">
                    <button class="btn btn-success">Asignar</button>
                </td>
              </tr>
            </tbody>
          </table>


        </div>
    </div>
</div>
@endsection
