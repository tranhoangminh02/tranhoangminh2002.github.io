
$(document).ready(function(){
  $("#country").change(function(){
    var id = $("#country").val();
    $.post("data.php",{id: id}, function(data){
      $("#state").html(data);
    })
  })
})


