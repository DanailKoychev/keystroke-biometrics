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

</head>

<body>
    <textarea id="text-input" cols="50" rows="5"></textarea>
    <br>
    <label for="user">Username</label>
    <input type="text" id="user">
    <label for="pass">Password</label>
    <input type="text" id="pass">
    <input type="button" id="save" value="save">
    <br>
    <br>
    <textarea id="model-output" cols ="50" rows="30"></textarea>

    <script>
        $("#text-input").keyup(key_up_handler);

        $("#text-input").keydown(key_down_handler);

        $("#save").click(save_to_db);

        periodic_query_for_model();
    </script>

</body>


</html>
