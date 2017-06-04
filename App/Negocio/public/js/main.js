$(document).ready(function(){

  $('#datetimepicker1').datetimepicker();
   var $input = $(".typeahead");
  $input.typeahead({
    source: [
      {id : "11111111-1", name: "Angel Maturana - 11111111-1"},
      {id : "1786100-5",  name: "Christian Santa Maria - 17861005-8"},
      {id : "11111111-2", name: "Nicolas Fuenzalida - 11111111-3"},
      {id : "11111111-3", name: "Nicolas Pedrazzini - 11111111-4"},
      {id : "11111111-4", name: "Mario Latapiatt 11111111-2 "}
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
