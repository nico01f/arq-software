$(document).ready(function(){
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
  })

  $("#AreaList").change(function(e){
    console.log($(this).val());

    $.getJSON(base_url + 'Epicrisis/JsonFuncionario?area_id='+$(this).val(),{}, function(funcionarios){
      $("#FuncList option").remove();
      if (funcionarios.length == 0) {
        $("#FuncList").append(
          $("<option></option>")
          .text("No se encontraron funcionarios.")
        )
      }else{
        for (var item of funcionarios) {
          $("#FuncList").append(
            $("<option></option>")
            .text(item.nombre+" "+item.apellido_p)
            .val(item.id)
          );
        }
      }
    })
  })



  $search.change(function(e) {
    e.preventDefault();
    var current = $search.typeahead("getActive");
    if (current) {
      console.log(current.id);
      // Some item from your model is active!
      if (current.name == $search.val()) {
        $('.client-data').show('fade');
        $('.derivacion').show('fade');

        $('#rut_paciente').val(current.rut);
        $('#sexo').val(current.sexo);
        $('#fecha_nacimiento').val(current.fec_nac);
        $('#nombre_paciente').val(current.name_2);
        $('#apellidos_paciente').val(current.apellido_p + current.apellido_m);
        // $('#nombre').val();
        // $('').val();
        // $('').val();


        // This means the exact match is found. Use toLowerCase() if you want case insensitive match.
      } else {
        // This means it is only a partial match, you can either add a new item
        // or take the active if you don't want new items
      }
    } else {
      // Nothing is active so it is a new value (or maybe empty value)
    }
  });

})
