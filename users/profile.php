<?php
    require_once('../templates/utilites.php');
    require_once('utilites/utilites.php');


    $filePath = '/home/virtwww/w_overwatch-ex-ru_36959326/http/img/users/avatar/';
?>


    <?php
        session_start();
        if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
            header("HTTP/1.1 301 Moved Permanently");
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/users/auth');
        }

        require_once('../templates/db_connect.php');

        $errorMsgs = []; //position, msg
        if (isset($_POST['general'])) {

            $name = mysqli_real_escape_string($dbc, htmlspecialchars(trim($_POST['name'])));
            $secondName = mysqli_real_escape_string($dbc, htmlspecialchars(trim($_POST['secondName'])));

            $dateBDDay = mysqli_real_escape_string($dbc, htmlspecialchars(trim($_POST['dateBDDay'])));
            $dateBDMonth = mysqli_real_escape_string($dbc, htmlspecialchars(trim($_POST['dateBDMonth'])));
            $dateBDYear = mysqli_real_escape_string($dbc, htmlspecialchars(trim($_POST['dateBDYear'])));


            if ($_POST['sex']==1)
                $sex = 1;
            if ($_POST['sex']==0)
                $sex = 0;

            if ($_POST['b64img']) {
                $fileData = base64_decode($_POST['b64img']);
                $fileName = sha1($_SESSION['user_id'].'ля-ля').'.png';
                file_put_contents($filePath.$fileName, $fileData);
            } else {
                $fileName = NULL;
            }

            if (mb_strlen($name, "UTF-8") > 30)
                $errorMsgs['name'] = "Длина имени должна составлять менее 30 символов.";
            if (mb_strlen($secondName, "UTF-8") > 35)
                $errorMsgs['secondName'] = "Длина фамилии должна составлять менее 35 символов.";
            if (checkBDDate($dateBDDay, $dateBDMonth, $dateBDYear) !== true)
                $errorMsgs['dateDB'] = checkBDDate($dateBDDay, $dateBDMonth, $dateBDYear);

            if (empty($errorMsgs)) {
                $birthday = dateToString($dateBDDay, $dateBDMonth, $dateBDYear);

                $query = "UPDATE users_general ug, users u SET
                    ug.name = '$name',
                    ug.second_name = '$secondName',
                    ug.birthday = '$birthday',
                    ug.sex = $sex";

                if ($fileName != NULL) {
                    $query = $query.",
                    u.user_image = '$fileName'
                    WHERE ug.user_id = u.user_id AND ug.user_id = ".$_SESSION['user_id'];
                } else {
                    $query = $query."
                    WHERE ug.user_id = u.user_id AND ug.user_id = ".$_SESSION['user_id'];
                }

                mysqli_query($dbc, $query)
                    or die('Произошла ошибка обращения к базе данных');
            }
        }

        if (isset($_POST['contacts'])) {
            $country = mysqli_real_escape_string($dbc, htmlspecialchars(trim($_POST['country'])));
            $city = mysqli_real_escape_string($dbc, htmlspecialchars(trim($_POST['city'])));
            $mobile = mysqli_real_escape_string($dbc, htmlspecialchars(trim($_POST['mobile'])));

            $query = "UPDATE users_contacts SET
                country = '$country',
                city = '$city',
                phone = $mobile
                WHERE user_id = ".$_SESSION['user_id'];
            mysqli_query($dbc, $query)
                or die('Произошла ошибка обращения к базе данных');
        }


        $query = "SELECT
                    ug.*,
                    uc.country,
                    uc.city,
                    u.user_image
                FROM users_general ug
                INNER JOIN users_contacts uc ON ug.user_id = uc.user_id
                INNER JOIN users u ON ug.user_id = u.user_id
                WHERE ug.user_id = ".$_SESSION['user_id'];
        $result = mysqli_query($dbc, $query)
            or die('Ошибка при обращении к базе данных');
        $row = mysqli_fetch_array($result);
    ?>

    <!DOCTYPE html>
    <html lang="ru">

    <head>
        <meta charset="UTF-8">
        <title>Профиль</title>
        <link rel="stylesheet" href="../css/profile.css">
        <script src="../js/jQuery-2.2.0-min.js"></script>
        <script src="../js/jquery-ui-1.12.0/jquery-ui.min.js"></script>
    </head>

    <body>
        <div class="black-bg hidden"></div>
        <div class="modal-block hidden">
            <ul class="img-control-panel">
                <li class="img-control-panel-item" id="zoom-plus"></li>
                <li class="img-control-panel-item" id="zoom-sub"></li>
            </ul>
            <canvas id="modal-canvas" width="400" height="400"></canvas>
        </div>

    <?php
        include('utilites/top_panel.php');
    ?>
            <div class="profile">
                <header class="profile-header">
                    Профиль пользователя
                </header>
                <ul class="profile-navlist">
                    <li class="profile-navlist-item active" id="general-i">Основное</li>
                    <li class="profile-navlist-item" id="change_psw-i">Смена пароля</li>
                    <li class="profile-navlist-item" id="contacts-i">Контакты</li>
                </ul>
                <form class="profile-group" id="general" action="<?= withoutPHP($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
                    <div class="profile-item">
                        <!--               <div class="left-cell" id="editImg"></div>-->
                        <div class="left-cell">

                            <canvas class="editImg" id="profCanvas" width="200" height="200">
                            </canvas>
                        </div>
                        <div class="right-cell">
                            <div class="add-img" id="add-img-id">
                                Добавить изображение
                            </div>
                        </div>
                        <input type="hidden" name="max_file_size" value="51200">
                        <input type="file" class="hidden" id="fileSelector" onchange="handleFiles(this.files)">
                        <input type="hidden" name="b64img" id="b64img">

                    </div>
                    <div class="profile-item">
                        <label for="name" class="left-cell">Имя:</label>
                        <div class="right-cell">
                            <input type="text" name="name" value="<?= $row['name'] ?>" class="input-style">
                            <?php
                                if (isset($errorMsgs['name']))
                                echo '<label class="form_item_error" for="name">'.$errorMsgs['name'].'</label>';
                            ?>
                        </div>
                    </div>
                    <div class="profile-item">
                        <label for="secondName" class="left-cell">Фамилия:</label>
                        <div class="right-cell">
                            <input type="text" name="secondName" value="<?= $row['second_name'] ?>" class="input-style">
                            <?php
                                if (isset($errorMsgs['secondName']))
                                    echo '<label class="form_item_error" for="name">'.$errorMsgs['secondName'].'</label>';
                            ?>
                        </div>
                    </div>
                    <div class="profile-item">
                        <label for="dateBD" class="left-cell">Дата рождения:</label>
                        <div class="right-cell">
                            <?php
                                if (mb_substr($row['birthday'], 8, 2, "UTF-8") != 'nn') {
                                    $day = mb_substr($row['birthday'], 8, 2, "UTF-8");
                                } else {
                                    $day = '';
                                }
                            ?>
                            <input type="text" name="dateBDDay" value="<?= $day ?>" class="input-style data-input" placeholder="ДД">
                            <?php
                                if ($month = mb_substr($row['birthday'], 5, 2, "UTF-8") != 'nn') {
                                    $month = mb_substr($row['birthday'], 5, 2, "UTF-8");
                                } else {
                                    $month = '';
                                }
                            ?>
                            <select name="dateBDMonth" class="month-input input-style">
                                <option value="" <?= $month==='nn'? 'selected' : '' ?>>Выберите месяц</option>
                                <option value="1" <?= $month==='01'? 'selected' : '' ?>>Января</option>
                                <option value="2" <?= $month==='02'? 'selected' : '' ?>>Февраля</option>
                                <option value="3" <?= $month==='03'? 'selected' : '' ?>>Марта</option>
                                <option value="4" <?= $month==='04'? 'selected' : '' ?>>Апреля</option>
                                <option value="5" <?= $month==='05'? 'selected' : '' ?>>Мая</option>
                                <option value="6" <?= $month==='06'? 'selected' : '' ?>>Июня</option>
                                <option value="7" <?= $month==='07'? 'selected' : '' ?>>Июля</option>
                                <option value="8" <?= $month==='08'? 'selected' : '' ?>>Августа</option>
                                <option value="9" <?= $month==='09'? 'selected' : '' ?>>Сентября</option>
                                <option value="10" <?= $month==='10'? 'selected' : '' ?>>Октября</option>
                                <option value="11" <?= $month==='11'? 'selected' : '' ?>>Ноября</option>
                                <option value="12" <?= $month==='12'? 'selected' : '' ?>>Декабря</option>
                            </select>
                            <?php
                                if (mb_substr($row['birthday'], 0, 4, "UTF-8") != 'nnnn') {
                                    $year = mb_substr($row['birthday'], 0, 4, "UTF-8");
                                } else {
                                    $year = '';
                                }
                            ?>
                            <input type="text" name="dateBDYear" class="input-style data-input" placeholder="ГГГГ" value="<?= $year ?>">
                            <?php
                                if (isset($errorMsgs['dateDB']))
                                echo '<label class="form_item_error">'.$errorMsgs['dateDB'].'</label>';
                            ?>
                        </div>
                    </div>
                    <div class="profile-item">
                        <label for="sex" class="left-cell">Пол:</label>
                        <div class="right-cell">
                            <input type="radio" name="sex" value="1"  <?= ($row['sex']==1)? 'checked' : '' ?>>Мужской
                            <input type="radio" name="sex" value="0"  <?= ($row['sex']==0)? 'checked' : '' ?>>Женский
                        </div>
                    </div>
                    <?= submit('general') ?>
                </form>
                <form class="profile-group hidden" id="change_psw" action="<?= withoutPHP($_SERVER['PHP_SELF']) ?>" method="post">
                    <div class="profile-item">
                        <label for="password" class="left-cell">Текущий пароль:</label>
                        <div class="right-cell">
                            <input type="password" name="password" class="input-style">
                        </div>
                    </div>
                    <div class="profile-item">
                        <label for="newpassword" class="left-cell">Новый пароль:</label>
                        <div class="right-cell">
                            <input type="password" name="newpassword" class="input-style" id="newpassword">
                        </div>
                    </div>
                    <div class="profile-item">
                        <label for="reppassword" class="left-cell">Повторите новый пароль:</label>
                        <div class="right-cell">
                            <input type="password" name="reppassword" class="input-style">
                        </div>
                    </div>
                    <?= submit('password') ?>
                </form>
                <form class="profile-group hidden" id="contacts" action="<?= withoutPHP($_SERVER['PHP_SELF']) ?>" method="post">
                    <div class="profile-item">
                        <label for="country" class="left-cell">Страна:</label>
                        <div class="right-cell">
                            <input type="text" name="country" class="input-style" value="<?= $row['country'] ?>">
                        </div>
                    </div>
                    <div class="profile-item">
                        <label for="city" class="left-cell">Город:</label>
                        <div class="right-cell">
                            <input type="text" name="city" class="input-style" value="<?= $row['city'] ?>">
                        </div>
                    </div>
                    <div class="profile-item">
                        <label for="skype" class="left-cell">Battle Tag:</label>
                        <div class="right-cell">
                            <input type="text" name="battle-tag" class="input-style">
                        </div>
                    </div>
                    <div class="profile-item">
                        <label for="skype" class="left-cell">Skype:</label>
                        <div class="right-cell">
                            <input type="text" name="skype" class="input-style">
                        </div>
                    </div>
                    <?= submit('contacts') ?>
                </form>
            </div>
            <script defer src="../js/img-cropper.js"></script>
            <script>
                $('#general-i').click(function () {
                    $('#change_psw-i').removeClass('active');
                    $('#contacts-i').removeClass('active');
                    $('#general-i').addClass('active');

                    $('#change_psw').hide();
                    $('#contacts').hide();
                    $('#general').show();
                });
                $('#change_psw-i').click(function () {
                    $('#general-i').removeClass('active');
                    $('#contacts-i').removeClass('active');
                    $('#change_psw-i').addClass('active');

                    $('#general').hide();
                    $('#contacts').hide();
                    $('#change_psw').show();
                });
                $('#contacts-i').click(function () {
                    $('#general-i').removeClass('active');
                    $('#change_psw-i').removeClass('active');
                    $('#contacts-i').addClass('active');

                    $('#general').hide();
                    $('#change_psw').hide();
                    $('#contacts').show();
                });

                $('.add-img').click(function () {
                    $('#fileSelector').click();
                });

                $(document).ready(function () {
                    profImg.src = <?php
                        if ($row['user_image'] == NULL) {
                            echo "'../img/users/avatar/avatar.jpg'";
                        } else {
                            echo "'../img/users/avatar/".$row['user_image']."'";
                        }
                    ?>;
                    //console.dir(profImg);
                    p_context.drawImage(profImg, 0, 0, 200, 200);
                });
            </script>
            <script src="../js/jquery.validate.min.js"></script>
            <script src="../js/profile-validation.js"></script>
            <?php
                mysqli_close($dbc);
            ?>
    </body>

    </html>
