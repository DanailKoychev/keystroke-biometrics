var periodic_query_for_model = function(){
  $.ajax({
      url: "get_user_with_closest_model.php",
      type: "POST",
      success: function(data) {
        on_response(data);
      },
      complete: function(){
        if(document.getElementById("text_placeholder").value != ""){
          setTimeout(periodic_query_for_model, 500);
        }
      }

  });
}

var periodic_query_for_model_legacy = function(){
  $.ajax({
      url: "get_user_with_closest_model.php",
      type: "POST",
      success: function(data) {
        document.getElementById("model-output").value = data;
      },
      complete: function(){
          setTimeout(periodic_query_for_model_legacy, 500);
      }

  });
}

var on_response = function(data){
  var json_response = JSON.parse(data);
  var text = "";
  var username = document.getElementById("guess_container");

  for(var i = 0; i < json_response.length && i < 2; i++){
    var current = json_response[i];
    text += current['username']  + " " +  Math.round(current["similarity"] * 100) + "%\n";
  }

  username.innerHTML = text;
}
