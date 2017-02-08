var check_closest_model = function(){
  $.ajax({
      url: "get_user_with_closest_model.php",
      type: "POST",
      success: function(data) {
          document.getElementById("result").value = data;
      }
  });
}
