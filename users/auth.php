<?php
    if (isset($_POST['auth'])) {
        require_once('../templates/db_connect.php');
        $name = mysqli_real_escape_string($dbc, htmlspecialchars((trim($_POST['login']))));
        $pswd = mysqli_real_escape_string($dbc, (trim($_POST['pswd'])));
        $query = "SELECT user_id, username FROM users WHERE username = '$name' AND password = '".sha1($pswd.'ant-man6102')."'";
        $result = mysqli_query($dbc, $query)
            or die('Ошибка при обращении к базе данных');
        $row = mysqli_fetch_array($result);

        if (mysqli_num_rows($result) == 1) {
            session_start();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['login'] = $row['username'];

            if ($_POST['remember'] == 1) {
                $authHash = sha1(time().'somesalt');
                setcookie("authKey", $authHash, time()+3600*24*30*3, "/");

                $query = "UPDATE users SET auth_key = '$authHash' WHERE user_id = ".$row['user_id'];
                $authQuery = mysqli_query($dbc, $query)
                    or die('Ошибка при обращении к базе данных[2]');
            }
            header("HTTP/1.1 301 Moved Permanently");
            header('Location: http://'.$_SERVER['HTTP_HOST']);
        } else {
            if (mysqli_num_rows($result) == 0) {
                $msg = '<p class="error">Имя пользователя или пароль неверны</p>';
            } else {
                echo '<p class="error">Извиняй, какая-то ошибка.[ncount]</p>';
                exit();
            }
        }
    }

    $path = '../';
    require_once($path.'templates/utilites.php');
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Overwatch-explained</title>
    <link rel="shortcut icon" href="/img/favicon/favicon..ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php cssPath(); ?>">
    <script src="<?= levelDiff();?>js/jQuery-2.2.0-min.js"></script>
    <script src="<?= levelDiff();?>js/jquery-ui-1.12.0/jquery-ui.min.js"></script>
</head>

<body>
    <form action="" class="authForm" method="post">
        <h2>Вход</h2>
        <?= $msg ?>
        <label for="login">Никнейм:</label>
        <input type="text" name="login">
        <label for="pswd">Пароль:</label>
        <input type="password" name="pswd">
        <label for="remember">Запомнить:</label>
        <input type="checkbox" name="remember" value="1">
        <input type="submit" value="Войти" name="auth">
    </form>
</body>
</html>
