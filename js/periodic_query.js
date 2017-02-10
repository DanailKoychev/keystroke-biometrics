var periodic_query_for_model = function(){
  $.ajax({
      //url: "respond.php",
      url: "get_user_with_closest_model.php",
      type: "POST",
      success: function(data) {
        // document.getElementById("model-output").value = data;
        on_response(data);
          //console.log(data);
      },
      complete: function(){
        if(document.getElementById("text_placeholder").value != ""){
          setTimeout(periodic_query_for_model, 500);
        }
      }

  });
}

var on_response = function(data){
  // console.log(data);
  var json_response = JSON.parse(data);
  var best_one = json_response[0];
  var username = document.getElementById("guess_container");
  username.innerHTML = best_one["username"];
  var similarity = document.getElementById("percentage_similar").innerHTML;
  similarity.innerHTML = best_one["similarity"];
}
