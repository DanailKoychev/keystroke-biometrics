var periodic_query_for_model = function(){
  $.ajax({
      //url: "respond.php",
      url: "get_user_with_closest_model.php",
      type: "POST",
      success: function(data) {
        document.getElementById("model-output").value = data;
          //console.log(data);
      },
      complete: function(){
        setTimeout(periodic_query_for_model, 500);
      }

  });
}
