var save_to_db = function(){
  var credentials = {
    "username" : document.getElementById("username").value,
  };
  $.ajax({
      url: "save_to_db.php",
      data: credentials,
      type: "POST",
      success: function(data) {
          console.log(data);
          if (data === "success"){
            document.getElementById("enter_name").innerHTML = "Успешно е добавено в базата!";
            $("#record_button").removeClass("btn-primary").addClass("btn-success");
             $('#record_button').attr("disabled", true);
          }else{
            document.getElementById("enter_name").innerHTML = "Вече съществува такова име в базата.";
            $("#record_button").removeClass("btn-primary").addClass("btn-danger");
          }
      }
  });
}
