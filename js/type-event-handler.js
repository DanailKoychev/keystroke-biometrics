var input_handler = function(event) {
    key_representation = {
        "key": event.key,
        "timeStamp": (new Date()).getTime(),
        "timeStampBrowserSpecific": event.timeStamp,
        "shiftKey": event.shiftKey,
        "type": event.type
    }
    console.log(key_representation);
    $.ajax({
        url: "handle_input.php",
        data: key_representation,
        type: "POST",
        success: function(data) {
            console.log(data);
        }
    });
}
