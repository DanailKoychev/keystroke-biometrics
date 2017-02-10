<?php
session_start();

//clear session info on refresh
$_SESSION = array();
?>
<html>

<head>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/type-event-handler.js"></script>
    <script src="js/periodic_query.js"></script>
    <script src="js/save_to_db.js"></script>
    <script src="js/check_closest_model.js"></script>

</head>

<body>
    <textarea id="text-input" cols="50" rows="5"></textarea>
    <br>
    <label for="username">Username</label>
    <input type="text" id="username">
    <label for="pass">Password</label>
    <input type="text" id="pass">
    <input type="button" id="save" value="save">
    <br>
    <br>
    <textarea id="model-output" cols ="50" rows="15"></textarea>
    <br><br>
    <textarea id="result" cols="50" rows="15"></textarea>
    <input type="button" id="check" value="check">

    <script>
        $("#text-input").keyup(key_up_handler);

        $("#text-input").keydown(key_down_handler);

        $("#save").click(save_to_db);

        $("#check").click(check_closest_model);

        periodic_query_for_model_legacy();
    </script>

</body>


</html>
