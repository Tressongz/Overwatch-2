<?php
    require_once('../templates/authorize.php');
    require_once('../templates/db_connect.php');
    require_once('templates_a/header_a.php');
    echo '<p>Добавление потасовки</p><br>';


    if (isset($_POST['submit'])) {

                    $header = $_POST['sm_name'];
                    $description = $_POST['sm_description'];
                    $icon = $_POST['sm_icon'];
                    $heroes = $_POST['sm_heroes'];
                    $health = $_POST['sm_health'];
                    $recovery = $_POST['sm_recovery'];
                    $power = $_POST['sm_power'];
                    $maps = $_POST['sm_maps'];
                    $info = $_POST['sm_more_info'];
                    $members = $_POST['sm_members'];
                    $time = $_POST['sm_time'];
                    $review = $_POST['sm_review'];

                if (!empty($header) && !empty($description) && !empty($icon)) {
                $query = "INSERT INTO scrimmages (sm_name, sm_description, sm_icon, sm_heroes, sm_health, sm_recovery, sm_power, sm_maps, sm_more_info, sm_members, sm_time, sm_review) VALUES ('$header', '$description', '$icon', '$heroes', '$health', '$recovery', '$power', '$maps', '$info', '$members', '$time', '$review')";

                    mysqli_query($dbc, $query)
                        or die('Ошибка при передаче POST-данных');
                    echo '<p class="goodJob">Поздравляю, потасовка успешно добавлена!</p>';
                    mysqli_close($dbc);
                } else {
                    echo '<p class="error">Какое-то из основных полей пусто!</p>';
                }
            }
?>
    <form action="add_scrimmage" method="post" class="admin-form" onkeydown="if(event.keyCode==13){return false;}">
        <label for="sm_name">Название потасовки: </label>
        <input type="text" id="sm_name" name="sm_name" placeholder="Название потасовки из игры" size="30px">
        <br>
        <label for="sm_description">Описание потасовки: </label>
        <input type="text" id="sm_description" name="sm_description" placeholder="Описание потасовки из игры" size="30px">
        <br>
        <label for="sm_icon">Изображение к потасовке: </label>
        <input type="text" id="sm_icon" name="sm_icon" placeholder="Изображение из галлереи" size="30px">
        <br>
        <label for="sm_heroes">Доступные герои: </label>
        <input type="text" id="sm_heroes" name="sm_heroes" placeholder="Герои через запятую" size="30px">
        <br>
        <label for="sm_health">Количество здоровья: (Число в процентах от номинального здоровья) </label>
        <input type="text" id="sm_health" name="sm_health" placeholder="Например 50" size="15px">
        <br>
        <label for="sm_recovery">Восстановление способностей: (Число в процентах от номинального восстановления) </label>
        <input type="text" id="sm_recovery" name="sm_recovery" placeholder="Например 50" size="15px">
        <br>
        <label for="sm_power">Заряд суперспособностей: (Число в процентах от номинального заряда) </label>
        <input type="text" id="sm_power" name="sm_power" placeholder="Например 50" size="15px">
        <br>
        <label for="sm_maps">Поле боя: </label>
        <input type="text" id="sm_maps" name="sm_maps" placeholder="Поля боя через запятую" size="30px">
        <br>
        <label for="sm_members">Количество в команде: </label>
        <input type="text" id="sm_members" name="sm_members" placeholder="Людей в команде" size="30px">
        <br>
        <label for="sm_time">Длительность матча: </label>
        <input type="text" id="sm_time" name="sm_time" placeholder="Продолжительность сражения" size="30px">
        <br>
        <label for="sm_more_info">Дополнительное условие: </label>
        <input type="text" id="sm_more_info" name="sm_more_info" placeholder="Что-то не стандартное" size="30px">
        <br>
        <label for="sm_review">Наша рецензия: </label>
        <textarea name="sm_review" cols="40" rows="3" id="sm_review" placeholder="Наше краткое описание данной потасовки" size="50px"></textarea>
        <br>
        <input type="submit" name="submit" id="submit" value="Добавить">
    </form>
<?php
    require_once('templates_a/footer_a.php');
?>

