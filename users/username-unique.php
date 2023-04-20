<?php

    if (isset($_POST['name'])) {
        require_once('../templates/db_connect.php');
        $name = $_POST['name'];

        $name = mysqli_real_escape_string($dbc, trim($name));

        $query = "SELECT COUNT(user_id) FROM `users` WHERE username = '$name'";
        $result = mysqli_query($dbc, $query);
        $nameCount = mysqli_fetch_row($result);


        if ($nameCount[0] != "0") {
            echo "false";
        } else {
            echo "true";
        }
    }

