<?php

    if (isset($_POST['email'])) {
        require_once('../templates/db_connect.php');
        $email = $_POST['email'];

        $email = mysqli_real_escape_string($dbc, trim($email));

        $query = "SELECT COUNT(user_id) FROM `users` WHERE email = '$email'";
        $result = mysqli_query($dbc, $query);
        $nameCount = mysqli_fetch_row($result);


        if ($nameCount[0] != "0") {
            echo "false";
        } else {
            echo "true";
        }
    }
