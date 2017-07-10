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
                    @foreach ($pacientes as $paciente)
                        <tr>
                            <td class="text-center">{{ $paciente['id'] }}</td>
                            <td class="text-center">{{ $paciente['nombre'] }}</td>
                            <td class="text-center">{{ $paciente['fecha'] }}</td>
                            <td class="text-center">
                                <button class="btn btn-success" onclick="asignaMedico({{ $paciente['id'] }},{{ $user['id'] }},{{ $paciente['paciente_id'] }})">Asignar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>
<script type="text/javascript">
function asignaMedico(ficha,funcionario,paciente_id){
    var base_url  = "http://190.8.110.120/";

    $.ajax({
        url: base_url + 'Epicrisis/AsignarPaciente',
        type:"POST",
        data:{
            ficha : ficha ,
            funcionario : funcionario ,
            _csrf :  $('meta[name="csrf-token"]').attr("content")
        } ,
        success: function(response){
            console.log("RESPONSE: ",response);
            alert(response.message)

            window.location.href = "/Epicrisis/"+ficha+"/"+paciente_id;
        },
        error:function(error){
            console.log(error);
        }
    });
}
</script>
@endsection
