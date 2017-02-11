var on_home_button_press = function(){
  clear_session();
  $("#global_container").fadeOut(200);
  $("#initial_navigation").fadeIn(200);
  $("#input").prop("disabled", false);
  $("#text_container").animate({opacity: 100});
  read_text();
  handle_input_box_visuals();
}

var clear_session = function(){
  $.ajax({
      url: "clear_session.php",
      type: "POST",
      success: function(data) {
        console.log(data);
      }
  });
}
