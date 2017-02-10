var key_downs = [];
var key_down_handler = function(event) {
    key_representation = {
        "key": event.key,
        "timeStampDown": (new Date()).getTime(),
        "timeStampBrowserSpecificDown": event.timeStamp,
        "shiftKey": event.shiftKey,
    };
    var key_downs_length = key_downs.length;
    if (key_downs_length === 0 || key_downs[key_downs_length - 1]["key"] !== event.key) {
        key_downs.push(key_representation);
    }

}

var key_up_handler = function(event) {
    var time_up = (new Date()).getTime();
    for (var i = 0; i < key_downs.length; i++) {
        if (key_downs[i]["key"] == event.key) {
            var repr = key_downs[i]
            repr["timeStampBrowserSpecificUp"] = event.timeStamp;
            repr["timeStampUp"] = time_up;
            repr["timeHold"] = repr["timeStampUp"] - repr["timeStampDown"];
            repr["timeHoldBrowserSpecific"] = repr["timeStampBrowserSpecificUp"] - repr["timeStampBrowserSpecificDown"];
            key_downs.splice(i, 1);

            $.ajax({
                url: "handle_input.php",
                data: repr,
                type: "POST",
                success: function(data) {
                }
            });
        }
    }
}
