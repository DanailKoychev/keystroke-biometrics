<?php
session_start();

//clear session info on refresh
$_SESSION = array();
?>
<html>

<head>
    <script>
        var amount_of_text_written = 0;
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/type-event-handler.js"></script>
    <script src="js/periodic_query.js"></script>
    <script src="js/save_to_db.js"></script>
    <script src="js/check_closest_model.js"></script>
    <script src="js/file_reader.js"></script>
    <script src="js/input_box_visuals.js"></script>
    <script src="js/enable_login.js"></script>
    <script src="js/choose_mode.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <!-- <textarea id="text-input" cols="50" rows="5"></textarea>
    <br>
    <label for="user">Username</label>
    <input type="text" id="user">
    <label for="pass">Password</label>
    <input type="text" id="pass">
    <input type="button" id="save" value="save">
    <br>
    <br>
    <textarea id="model-output" cols ="50" rows="20"></textarea>
    <br><br>
    <textarea id="result" cols="50" rows="5"></textarea>
    <input type="button" id="check" value="check"> -->

<!-- ################################################################## -->
    <input type="hidden" id="mode" autocomplete="off">
    <div class="initial_navigation" id="initial_navigation">
        <a href="#" id="save_button" class="btn btn-primary initial_nav_size"><span class="glyphicon glyphicon-floppy-save"></span> Запази</a>
        <br>
        <a href="#" id="id_button" class="btn btn-success initial_nav_size" style="margin-top: 30px"><span class="glyphicon glyphicon-check"></span> Идентифицирай</a>
    </div>
    <div id="global_container" style="display: none;">
        <form autocomplete="off">
            <input type="hidden" id="text_placeholder" autocomplete="off">
            <div class="input_and_text_container">
                <div class="text_container" id="text_container"></div>
                <div class="form-group">
                    <input type="text" class="form-control input_box" id="input" placeholder="Пишете текст тук">
                </div>
            </div>
        </form>

        <div class="record" id="record_div">
            <h5 id="enter_name">Въведете име</h5>
            <input type="text" class="form-control" id="username" placeholder="Име">
            <button id="record_button" class="btn btn-primary record_button">Запази</button>
        </div>

        <div id="guess_div" class="guess_div" style="display: none;">
            <h5 class>Може би?</h5>
            <pre style="margin-top: 20px"><div id="guess_container">Бай Хуй</div></pre>
            <div id="percentage_similar"></div>
        </div>
    </div>

    <script>
        $("#input").keyup(key_up_handler);
        $("#input").keydown(key_down_handler);

        $("#record_button").click(save_to_db);

        var text_global = read_text();
        $("#record_div").hide();
        $("#input").keyup(handle_input_box_visuals);
        $("#input").keyup(enable_login);
        $("#save_button").click(start_save_mode);
        $("#id_button").click(start_auth_mode);
        set_style_of_already_written();

    </script>

</body>


</html>
