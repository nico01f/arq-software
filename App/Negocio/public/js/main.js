

$(document).ready(function(){
  $('#rut_paciente').rut();
  var base_url  = "http://190.8.110.120/";

  var $search = $(".typeahead");
  $.get(base_url + 'Epicrisis/JsonPaciente',{}, function(pacientes){
    $search.typeahead({
      source:  pacientes ,
      autoSelect: true,
      fitToElement : true
    });
  })

  $.getJSON(base_url + 'Epicrisis/JsonArea',{}, function(areas){
    $("#AreaList option").remove();
    $("#AreaList").append( $("<option></option>").text("Seleccione un area..").val(-1));
    for (var item of areas) {
      $("#AreaList").append(
        $("<option></option>")
        .text(item.valor)
        .val(item.id)
      );
    }
  });
  function abrirEspera(){
    $('#loading').show('fade');
  }
  function cerrarEspera(){
    $('#loading').hide('fade');
  }
  $('#submit-btn').click(function(e){

    var rut =  $('#rut_paciente').val();
    var sexo =  $('#sexo').val();
    var fecha_nacimiento =  $('#fecha_nacimiento').val();
    var nombre_paciente =  $('#nombre_paciente').val();
    var apellido_p  = $('#ape_p').val();
    var apellido_m = $('#ape_m').val();
    var prevision = $('#prevision').val();
    var area = $('#AreaList').val();

    console.log(rut,sexo,fecha_nacimiento,nombre_paciente,apellido_m,apellido_p,area);
    $.ajax({
        url: base_url + 'Epicrisis/CreatePaciente',
        type:"POST",
        data:{
          rut : rut ,
          sexo : sexo,
          fecha_nacimiento : fecha_nacimiento,
          nombre : nombre_paciente,
          apellido_paterno : apellido_p,
          apellido_materno : apellido_m,
          area : area,
          prevision : prevision,
          paciente_id: $('#paciente_id').val(),
          _csrf :  $('meta[name="csrf-token"]').attr("content")
        } ,
        beforeSend: abrirEspera,
        complete:cerrarEspera,
        success: function(response){
          if (response.status == false) {
            $('#errors').show('fade');
            $('#errors').text(response.message);
          }else{
            alert("Paciente ingresado exitosamente");
            window.location.reload();
          }
        },
        error:function(error){
          console.log(error);
        }
    });

  })

  $search.change(function(e) {
    e.preventDefault();
    var current = $search.typeahead("getActive");

    if (current) {
      console.log(current.id);
      // Some item from your model is active!
      if (current.name == $search.val()) {
        console.log(current);
        $('.client-data').show('fade');
        $('.derivacion').show('fade');
        let new_rut = $.formatRut(current.rut);
        $('#paciente_id').val(current.id);
        $('#rut_paciente').val(new_rut);
        $('#sexo').val(current.sexo);
        $('#fecha_nacimiento').val(current.fec_nac);
        $('#nombre_paciente').val(current.name_2);
        $('#ape_p').val(current.apellido_p);
        $('#ape_m').val(current.apellido_m);

        // This means the exact match is found. Use toLowerCase() if you want case insensitive match.
      } else {
        // This means it is only a partial match, you can either add a new item
        // or take the active if you don't want new items
      }
    } else {
      // Nothing is active so it is a new value (or maybe empty value)
    }
  });

});
