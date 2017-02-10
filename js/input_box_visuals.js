var move_text = function(){
  var span_content = document.getElementById('text_placeholder').value;
  if(span_content == ""){
    return;
  }
  var span_splitted = span_content.split(" ");
  // console.log(span_splitted);
  var first_word = span_splitted[0];
  var input_content = document.getElementById('input').value;
  // console.log(first_word.length);
  // console.log(first_word);
  if(first_word.replace("\n", "").concat(" ").length <= input_content.length){
    document.getElementById('input').value = "";
    var without_first_word = span_splitted.slice(1, span_splitted.length);
    document.getElementById('text_placeholder').value = without_first_word.join(" ");

  }
}

var set_style_of_already_written = function(){
  var text = document.getElementById('text_placeholder').value;
  var splitted = text.split(" ");
  var first_word = splitted[0];
  var input_content = document.getElementById('input').value;


  var same_till = first_word.length - 1;
  for(var i = 0; i < first_word.length; i++){
    if(first_word[i] != input_content[i]){
      same_till = i-1;
      break;
    }
  }

  var without_first_word = splitted.splice(1, splitted.length);
  var same = "";
  var different = first_word;

  if(same_till != -1){
    same = first_word.substr(0, same_till + 1);
    different = first_word.substr(same_till + 1, first_word.length - 1);
  }

  var text_cont = document.getElementById("text_container");
  while (text_cont.hasChildNodes()) {

      text_cont.removeChild(text_cont.lastChild);
  }

  var textta = document.createElement("span");
  textta.setAttribute("class", "selected");
  var written_part = document.createElement("span");
  written_part.setAttribute("class", "written_part");
  var text_written = document.createTextNode(same);
  written_part.appendChild(text_written);
  textta.appendChild(written_part);
  var text_not_written = document.createTextNode(different);
  textta.appendChild(text_not_written);
  text_cont.appendChild(textta);
  var rest = document.createTextNode(" ".concat(without_first_word.join(" ")));
  text_cont.appendChild(rest);
}

var handle_input_box_visuals = function(){
  amount_of_text_written += 1;
  var started_periodic_query = false;
  move_text();
  set_style_of_already_written();
  show_guess(started_periodic_query);
}

var show_guess = function(started_periodic_query){
    var mode = document.getElementById("mode").value;
    if (amount_of_text_written > 10 && mode === "auth_mode"){
      $("#guess_div").fadeIn(200);
      if(!started_periodic_query){
        periodic_query_for_model();
        started_periodic_query = true;
      }
    }
    var text = document.getElementById("text_placeholder").value;
    if (text === ""){
      $("#text_container").animate({opacity: 0});
      // $("#input").prop( "disabled", true );
    }
}
