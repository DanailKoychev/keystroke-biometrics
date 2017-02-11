var start_save_mode = function(){
  document.getElementById("mode").value = "save_mode";
  $("#guess_div").hide();
  $("#initial_navigation").fadeOut(300);
  $("#global_container").fadeIn(300);
  document.getElementById("input").focus();
}

var start_auth_mode = function(){
  document.getElementById("mode").value = "auth_mode";
  $("#record_div").hide();
  $("#initial_navigation").fadeOut(300);
  $("#global_container").fadeIn(300);
  document.getElementById("input").focus();

}
