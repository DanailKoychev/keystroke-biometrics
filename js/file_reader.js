var read_text = function(){
    var output = "";
    $.ajax({
    type:    "GET",
    url:     "files/text.txt",
    async: false,
    success: function(text) {
        console.log(text);
        document.getElementById('text_placeholder').value = text;
        output = text;
    },
    error:   function() {
        // An error occurred
    }
  });
  return output;
}
