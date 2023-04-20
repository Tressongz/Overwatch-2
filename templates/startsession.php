<?php
  //$sessionStatus = false;
  //if (isset($_REQUEST[session_name()])) {
      session_start();
      //$sessionStatus = true;

      //if (!isset($_SESSION['user_id'])) {
        if (isset($_COOKIE['authKey'])) {
            require_once (__DIR__ . '/db_connect.php');
            $_COOKIE['authKey'] = mysqli_real_escape_string($dbc, $_COOKIE['authKey']);
            $query = "SELECT user_id, username FROM users WHERE auth_key = '".$_COOKIE['authKey']."'";
            $result = mysqli_query($dbc, $query);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result);
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
            }
            mysqli_close($dbc);
       }
     //}
  //}
?>
