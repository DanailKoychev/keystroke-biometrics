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

</head>

<body>
    <textarea id="text-input" cols="50" rows="5"></textarea>
    <br>
    <br>
    <textarea id="model-output" cols ="50" rows="30"></textarea>

    <script>
        $("#text-input").keyup(key_up_handler);

        $("#text-input").keydown(key_down_handler);
        periodic_query_for_model();
    </script>

</body>


</html>
