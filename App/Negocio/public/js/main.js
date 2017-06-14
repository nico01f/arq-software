$(document).ready(function(){
  var $input = $(".typeahead");
  $input.typeahead({
    source: [
      {id : "11111111-1", name: "Angel Maturana - 11111111-1", sexo:'m',prevision:'isapre',fecha_nacimiento:'03-03-92',nombre:'Angel',apellidos:'Maturana'},
      {id : "1786100-5",  name: "Christian Santa Maria - 17861005-8", sexo:'m',prevision:'isapre',fecha_nacimiento:'03-03-92',nombre:'Christian',apellidos:'Santa Maria'},
      {id : "11111111-2", name: "Nicolas Fuenzalida - 11111111-3", sexo:'m',prevision:'isapre',fecha_nacimiento:'03-03-92',nombre:'Nicolas',apellidos:'Fuenzalida'},
      {id : "11111111-3", name: "Nicolas Pedrazzini - 11111111-4", sexo:'m',prevision:'fonasa',fecha_nacimiento:'03-03-92',nombre:'Nicolas',apellidos:'Pedrazzini'},
      {id : "11111111-4", name: "Mario Latapiatt - 11111111-2 ", sexo:'m',prevision:'fonasa',fecha_nacimiento:'03-03-92',nombre:'Mario',apellidos:'Latapiatt'}
    ],
    autoSelect: true,
    fitToElement : true
    });

  $input.change(function(e) {
    e.preventDefault();
    var current = $input.typeahead("getActive");
    if (current) {
      console.log(current.id);
      // Some item from your model is active!
      if (current.name == $input.val()) {
        $('.client-data').show('fade');
        $('.derivacion').show('fade');

        $('#rut_paciente').val(current.id);
        $('#sexo').val(current.sexo);
        $('#fecha_nacimiento').val(current.fecha_nacimiento);
        $('#nombre_paciente').val(current.nombre);
        $('#apellidos_paciente').val(current.apellidos);
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
