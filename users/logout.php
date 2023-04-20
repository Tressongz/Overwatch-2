<?php
    session_start();
    if (isset($_COOKIE["authKey"])) {
        require_once('../templates/db_connect.php');
        $query = "UPDATE users SET auth_key = NULL WHERE user_id = ".$_SESSION['user_id'];
        mysqli_query($dbc, $query)
            or die('Мы не смогли Вас разлогинить!');
        mysqli_close($dbc);
    }
    setcookie("authKey", "", time()-3600, "/");
    $_SESSION = array();
    setcookie(session_name(), "", time()-86400, "/");
    session_destroy();
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: http://'.$_SERVER['HTTP_HOST']);
