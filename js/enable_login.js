var enable_login = function(){
  var text = document.getElementById('text_placeholder').value;
  var mode = document.getElementById('mode').value;
  if(text === "" && mode === "save_mode"){
    $("#record_div").fadeIn(300);
    $("#text_container").animate({opacity: 0});
    $("#input").prop( "disabled", true );
  }
}
