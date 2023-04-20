<?php
    require_once('../templates/db_connect.php');
    require_once('utilites/utilites.php');


    if (isset($_POST['submit'])) {

            $name = mysqli_real_escape_string($dbc, trim($_POST['name']));
            $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
            $password = mysqli_real_escape_string($dbc, sha1(trim($_POST['password'].'ant-man6102')));
            $password_second = mysqli_real_escape_string($dbc, sha1(trim($_POST['password_second'].'ant-man6102')));

            $errorMsgs = [];
            $required = 'Это поле обязательно.';
            $query = "SELECT COUNT(user_id) FROM `users` WHERE username = '$name'";
            $result = mysqli_query($dbc, $query);
            $nameCount = mysqli_fetch_row($result);
            if (empty($name)) {
                $errorMsgs['namereq'] = $required;
            } else if (mb_strlen($name, "UTF-8") < 3) {
                $errorMsgs['namelen'] = 'Длина имени должна быть не менее 4 символов.';
            } else if ($nameCount[0] != "0") {
                $errorMsgs['nameunique'] = 'Это имя уже занято.';
            }


            $query = "SELECT COUNT(user_id) FROM `users` WHERE email = '$email'";
            $result = mysqli_query($dbc, $query);
            $emailCount = mysqli_fetch_row($result);
            if (empty($email)) {
                $errorMsgs['emailreq'] = $required;
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errorMsgs['emailvalidate'] = 'Некорректный email-адрес.';
            } else if ($emailCount[0] != "0") {
                $errorMsgs['emailunique'] = 'Этот email-адрес уже занят.';
            }

            if ($password == sha1('ant-man6102')) {
                $errorMsgs['pswdreq'] = $required;
            } else if (mb_strlen($password, "UTF-8") < 6) {
                $errorMsgs['pswdlen'] = 'Длина пароля должна быть не менее 6 символов.';
            }

            if ($password!=$password_second) {
               $errorMsgs['pswdnotequal'] = 'Пароли не совпадают.';
            }


            if (empty($errorMsgs)) {
                $query="INSERT INTO users (username, password, email) VALUES ('$name', '$password', '$email')";
                mysqli_query($dbc, $query)
                    or die('Соединение с сервером потеряно');
                $user_id = mysqli_insert_id($dbc);

                $query="INSERT INTO users_general (user_id) VALUE ($user_id)";
                mysqli_query($dbc, $query)
                    or die('Соединение с сервером потеряно');

                $query="INSERT INTO users_contacts (user_id) VALUE ($user_id)";
                mysqli_query($dbc, $query)
                    or die('Соединение с сервером потеряно');

                session_start();
                $_SESSION['username'] = $name;
                $_SESSION['user_id'] = $user_id;

                header("HTTP/1.1 301 Moved Permanently");
                header('Location: http://'.$_SERVER['HTTP_HOST']);
            }
        }

?>

    <!DOCTYPE html>
    <html lang="ru">

    <head>
        <meta charset="UTF-8">
        <title>Регистрация</title>
        <link rel="stylesheet" href="../css/registration.css">
        <script src="../js/jQuery-2.2.0-min.js"></script>
    </head>

    <body>

    <ul id="scene">
<!--      <li class="layer" data-depth="0.00"><img src="../img/bg/parallax/first.jpg"></li>-->
    </ul>

        <div class="registration">
        <header class="registration-header">
            Регистрация
            <ul class="registration-header-decoration">
                <li class="registration-header-decoration-item red"></li>
                <li class="registration-header-decoration-item yellow"></li>
                <li class="registration-header-decoration-item green"></li>
            </ul>
        </header>
        <form action="<?php withoutPHP($_SERVER['PHP_SELF']); ?>" class="registration-form">
            <div class="registration-form-row">
                <div class="registration-form-label">
                    <label for="username">
                        Имя пользователя
                    </label>
                </div>
                <div class="registration-form-input">
                    <input type="text" name="name">
                    <?php
                        if (isset($errorMsgs['namereq'])) {
                            errorLabel($errorMsgs['namereq']);
                        } else if (isset($errorMsgs['namelen'])) {
                            errorLabel($errorMsgs['namelen']);
                        } if (isset($errorMsgs['nameunique'])) {
                            errorLabel($errorMsgs['nameunique']);
                        }
                     ?>
                </div>
            </div>

            <div class="registration-form-row">
                <div class="registration-form-label">
                    <label for="email">
                        Почта
                    </label>
                </div>
                <div class="registration-form-input">
                    <input type="email" name="email">
                    <?php
                        if (isset($errorMsgs['emailreq'])) {
                            errorLabel($errorMsgs['emailreq']);
                        } else if (isset($errorMsgs['emailvalidate'])) {
                            errorLabel($errorMsgs['emailvalidate']);
                        } else if (isset($errorMsgs['emailunique'])) {
                            errorLabel($errorMsgs['emailunique']);
                        }
                     ?>
                </div>
            </div>

            <div class="registration-form-row">
                <div class="registration-form-label">
                    <label for="pswd">
                        Пароль
                    </label>
                </div>
                <div class="registration-form-input">
                    <input type="password" name="password">
                    <?php
                        if (isset($errorMsgs['pswdreq'])) {
                            errorLabel($errorMsgs['pswdreq']);
                        } else if (isset($errorMsgs['pswdlen'])) {
                            errorLabel($errorMsgs['pswdlen']);
                        }
                     ?>
                </div>
            </div>

            <div class="registration-form-row">
                <div class="registration-form-label">
                    <label for="password_second">
                        Подтверждение пароля
                    </label>
                </div>
                <div class="registration-form-input">
                    <input type="password" name="password_second">
                    <?php
                        if (isset($errorMsgs['pswdnotequal'])) {
                            errorLabel($errorMsgs['pswdnotequal']);
                        }
                     ?>
                </div>
            </div>

            <div class="registration-form-row">
                <div class="registration-form-label">
                    <label>
                        <img src="utilites/captcha" alt="Упс, а где картинка?">
                    </label>
                </div>

                <div class="registration-form-input">
                    <input id="captcha-input" name="captcha-input" type="text">
                </div>
            </div>

            <div class="registration-form-row">
                <div class="registration-form-label">
                    <label for="submit">
                    </label>
                </div>
                <div class="registration-form-input">
                    <?= submit('submit', 'Зарегистрироваться') ?>
                </div>
            </div>

        </form>
        <footer class="registration-footer">
            <a href="<?= 'http://'.$_SERVER['HTTP_HOST'] ?>" class="goHome-link">Вернуться на сайт.</a>
        </footer>
    </div>



        <script src="../js/jquery.validate.min.js"></script>
        <script src="../js/registration-validation.js"></script>
        <script src="../js/parallax.min.js"></script>
        <script>
            var scene = document.getElementById('scene');
            var parallax = new Parallax(scene);
            parallax.invert(false, true);
            parallax.limit(false, 0);
        </script>
    </body>

    </html>
