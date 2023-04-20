<?php
    require_once('templates_a/header_a.php');
    echo ('<p>Редактирование потасовки</p>');
?>
<?php
            require_once('../templates/db_connect.php');
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
                if (isset($_POST['submit'])) {
                    $id = $_POST['SM_ID'];

                    $header = $_POST['SM_NAME'];
                    $description = $_POST['SM_DESCRIPTION'];
                    $icon = $_POST['SM_ICON'];
                    $heroes = $_POST['SM_HEROES'];
                    $health = $_POST['SM_HEALTH'];
                    $recovery = $_POST['SM_RECOVERY'];
                    $power = $_POST['SM_POWER'];
                    $maps = $_POST['SM_MAPS'];
                    $info = $_POST['SM_MORE_INFO'];
                    $members = $_POST['SM_MEMBERS'];
                    $time = $_POST['SM_TIME'];
                    $review = $_POST['SM_REVIEW'];

                    $query = "UPDATE scrimmages SET SM_NAME='$header', SM_DESCRIPTION='$description', SM_ICON='$icon', SM_HEROES='$heroes', SM_HEALTH='$health', SM_RECOVERY='$recovery', SM_POWER='$power', SM_MAPS='$maps', SM_MORE_INFO='$info', SM_MEMBERS='$members', SM_TIME='$time', SM_REVIEW='$review' WHERE SM_ID='$id'";

                    mysqli_query($dbc, $query)
                        or die('Ошибка при передаче POST-данных');
                    echo '<p class="goodJob">Поздравляю, потасовка изменена!</p>';
            }

            $query = "SELECT * FROM scrimmages WHERE SM_ID='$id'";
            $result = mysqli_query($dbc, $query)
                or die("Извините, произошла ошибка запроса на сервер");
            $row = mysqli_fetch_array($result);

        if ($row != NULL) {
                $header = $row['SM_NAME'];
                $description = $row['SM_DESCRIPTION'];
                $icon = $row['SM_ICON'];
                $heroes = $row['SM_HEROES'];
                $health = $row['SM_HEALTH'];
                $recovery = $row['SM_RECOVERY'];
                $power = $row['SM_POWER'];
                $maps = $row['SM_MAPS'];
                $info = $_POST['SM_MORE_INFO'];
                $members = $_POST['SM_MEMBERS'];
                $time = $_POST['SM_TIME'];
                $review = $row['SM_REVIEW'];
        }else {
                echo '<p class="error">Извиняй, какая-то ошибка.</p>';
                exit();
        }
?>
<form action="change_scrimmage?id=<?php echo $id; ?>" method="post" class="admin-form" onkeydown="if(event.keyCode==13){return false;}">
        <label for="sm_name">Название потасовки: </label>
        <input type="text" id="sm_name" name="SM_NAME" value="<?php echo $header; ?>" size="30px">
        <br>
        <label for="sm_description">Описание потасовки: </label>
        <input type="text" id="sm_description" name="SM_DESCRIPTION" value="<?php echo $description; ?>" size="30px">
        <br>
        <label for="sm_icon">Изображение к потасовке: </label>
        <input type="text" id="sm_icon" name="SM_ICON" value="<?php echo $icon; ?>" size="30px">
        <br>
        <label for="sm_heroes">Доступные герои: </label>
        <input type="text" id="sm_heroes" name="SM_HEROES" value="<?php echo $heroes; ?>" size="30px">
        <br>
        <label for="sm_health">Количество здоровья: (Число в процентах от номинального здоровья) </label>
        <input type="text" id="sm_health" name="SM_HEALTH" value="<?php echo $health; ?>" size="15px">
        <br>
        <label for="sm_recovery">Восстановление способностей: (Число в процентах от номинального восстановления) </label>
        <input type="text" id="sm_recovery" name="SM_RECOVERY" value="<?php echo $recovery; ?>" size="15px">
        <br>
        <label for="sm_power">Заряд суперспособностей: (Число в процентах от номинального заряда) </label>
        <input type="text" id="sm_power" name="SM_POWER" value="<?php echo $power; ?>" size="15px">
        <br>
        <label for="sm_maps">Поле боя: </label>
        <input type="text" id="sm_maps" name="SM_MAPS" value="<?php echo $maps; ?>" size="30px">
        <br>
        <label for="sm_members">Количество в команде: </label>
        <input type="text" id="sm_members" name="SM_MEMBERS" value="<?php echo $members; ?>" size="30px">
        <br>
        <label for="sm_time">Длительность матча: </label>
        <input type="text" id="sm_time" name="SM_TIME" value="<?php echo $time; ?>"  size="30px">
        <br>
        <label for="sm_more_info">Дополнительное условие: </label>
        <input type="text" id="sm_more_info" name="SM_MORE_INFO" value="<?php echo $info; ?>"  size="30px">
        <br>
        <label for="sm_review">Наша рецензия: </label>
        <input name="SM_REVIEW" id="sm_review" value="<?php echo $review; ?>" size="50px">
        <br>
        <input type="submit" name="submit" id="submit" value="Редактировать">
        <input type="hidden" name="SM_ID" id="sm_id" value="<?php echo $id; ?>">
</form>
<?php
    require_once('templates_a/footer_a.php');
    mysqli_close($dbc);
?>
