<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <style media="screen">
      body{

            font-family: inherit;
            font-weight: 500;
            line-height: 1.1;
            color: inherit;
            color: #73879C;
      }

      table{
        width: 90%;
        margin-left: auto;
        margin-right: auto;
        border-collapse: collapse;
        text-align: left;
        color: #5d666f !important;
        height: 30px;
      }

      table, td {
          border: 1px solid #ddd;
          text-align: left;
          height: 20px;
      }

      th{
        text-align: center;
        height: 30px;
      }

      td{
        font-size: 15px;
        height: 20px;
      }

      .td1{
        text-align: right;
      }

      .td2{
        text-align: left;
      }

      .firma1{
        margin-top: 300px;
        float: left;
      }

      .firma2{
        margin-top: 310px;
        font-family: inherit;
        font-weight: 500;
        line-height: 1.1;
        color: #73879C
        float: left;
        text-align: right;
      }

    </style>
  </head>
  <body>
    <div align="center">
      <h2>Documento formal de Diagnóstico</h2>
    </div>
    <br><br><br>
    <div>
      <table>
        <thead>
          <tr>
            <th>Valor</th>
            <th>Descripción</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class=="td1">Rut Paciente: </td>
            <td class=="td2"> {{ $fichas[0]->rut }} </td>
          </tr>
          <tr>
            <td class=="td1">Nombre Paciente: </td>
            <td class=="td2"> {{ $fichas[0]->nombre }} {{ $fichas[0]->apellidop }} {{ $fichas[0]->apellidom }} </td>
          </tr>
          <tr>
            <td class=="td1">Fecha Atención: </td>
            <td class=="td2"> {{ date('d/m/Y', strtotime($fichas[0]->fecha)) }} </td>
          </tr>
          <tr>
            <td class=="td1">Area de Atención: </td>
            <td class=="td2"> {{ $fichas[0]->area }} </td>
          </tr>
        </tbody>
      </table>
    </div>
    <br>
    <legend>Diagnóstico</legend>
    <br>
    @if(!empty($fichas[0]->diagnostico))
      @foreach ($fichas as $ficha)
        <p>{{ $ficha->diagnostico }}</p>
      @endforeach
    @else
      --SIN DIAGNÓSTICO--
    @endif

    <br><br>

    <legend>Receta</legend>
    <br>
    @if(!empty($fichas[0]->receta))
      @foreach ($fichas as $ficha)
        <p>{{ $ficha->receta }}</p>
      @endforeach
    @else
      --SIN RECETA--
    @endif

    <br><br>
    <div class="firma1">
    </div>
    <div class="firma2">
      <p>___________________________</p>
      <p><span>Firma y Timbre de Médico</span></p>
    </div>
  </body>
</html>
