var save_to_db = function(){
  var credentials = {
    "username" : document.getElementById("user").value,
    "password" : document.getElementById("pass").value
  };
  $.ajax({
      url: "save_to_db.php",
      data: credentials,
      type: "POST",
      success: function(data) {
          console.log(data);
      }
  });
}
