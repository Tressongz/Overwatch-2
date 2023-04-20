<?php
    require_once('templates/authorize.php');
?>
    <!DOCTYPE html>
    <html lang="ru">

    <head>
        <meta charset="UTF-8">
        <title>Overwatch-explained</title>
        <link rel="shortcut icon" href="/img/favicon/favicon.ico" type="image/x-icon">
    </head>

    <body>
        <h3>Добро пожаловать в админку Overwatch-explained</h3>
        <p><a href="admin/add_news.php">Добавить запись +</a></p>
        <p><a href="admin/add_img.php">Загрузить изображение +</a></p>
        <p><a href="admin/add_scrimmage.php">Добавить потасовку +</a></p>
        <?php
            require_once('templates/db_connect.php');
            echo '<h3>Новости</h3><hr>';
            $query = 'SELECT id, header FROM news ORDER BY post_date DESC';
            $result = mysqli_query($dbc, $query)
                or die("Извините, произошла ошибка запроса на сервер");

            while ($row = mysqli_fetch_array($result)) {
                echo $row['header'].' ';
                echo '<a href="admin/change_news.php?id='.$row['id'].'&content=1">Изменить</a> ';
                echo '<a href="admin/delete_news.php?id='.$row['id'].'&content=1">Удалить</a><br>';
            }

            echo '<h3>Статьи</h3><hr>';
            $query = 'SELECT id, header FROM articles ORDER BY post_date DESC';
            $result = mysqli_query($dbc, $query)
                or die("Извините, произошла ошибка запроса на сервер");

            while ($row = mysqli_fetch_array($result)) {
                echo $row['header'].' ';
                echo '<a href="admin/change_news.php?id='.$row['id'].'&content=2">Изменить</a> ';
                echo '<a href="admin/delete_news.php?id='.$row['id'].'&content=2">Удалить</a><br>';
            }

            //Потасовка
            echo '<h3>Потасовки</h3><hr>';

            $query_sm = "SELECT sm_id FROM sm_current WHERE sm_index=1";
            $result_sm = mysqli_query($dbc,$query_sm)
                or die("Извините, произошла ошибка запроса на сервер (1)");
            $row_sm = mysqli_fetch_array($result_sm);
            $sm_id = $row_sm['sm_id'];

            $query = "SELECT SM_NAME FROM scrimmages WHERE SM_ID='$sm_id'";
            $result = mysqli_query($dbc, $query)
                or die("Извините, произошла ошибка запроса на сервер (2)");
            $row = mysqli_fetch_array($result);
            $current_name = $row['SM_NAME'];

            echo '<p>Сейчас стоит: '.$current_name.'</p>';
            echo '<label for="sm_target">Выбор потасовки:</label>';

            $query = 'SELECT SM_ID, SM_NAME FROM scrimmages ORDER BY SM_ID';
            $result = mysqli_query($dbc, $query)
                or die("Извините, произошла ошибка запроса на сервер (3)");

             if (isset($_POST['target_st'])) {

                    $id_st =$_POST['sm_target'];
                    $index=1;

                    $query = "UPDATE sm_current SET sm_id='$id_st' WHERE sm_index='$index'";
                    mysqli_query($dbc, $query)
                            or die('Ошибка при передаче POST-данных');
            }
            ?>
        <form action="death_star" method="post" class="admin-form" onkeydown="if(event.keyCode==13){return false;}">
            <?php
            echo '<select id="sm_target" name="sm_target" autocomplete="off">';
            while($row = mysqli_fetch_array($result)) {
                echo '<option name="select" value="'.$row['SM_ID'].'">'.$row['SM_NAME'].'</option><br>';
            }
            echo '</select>';
        ?>
            <input type="submit" name="target_st" id="target_st" value="Установить"><br>
        </form>
    <?php
            echo '<p>Список потасовок:</p>';
            $query = 'SELECT SM_ID, SM_NAME FROM scrimmages ORDER BY SM_ID';
            $result = mysqli_query($dbc, $query)
                or die("Извините, произошла ошибка запроса на сервер (4)");
            while($row = mysqli_fetch_array($result)) {
                echo $row['SM_ID'].'.'.' ';
                echo $row['SM_NAME'].' ';
                echo '<a href="admin/change_scrimmage.php?id='.$row['SM_ID'].'">Изменить</a> ';
                echo '<a href="admin/delete_scrimmage.php?id='.$row['SM_ID'].'">Удалить</a><br>';
            }


 ?>
            <p>
                <a href="http://overwatch-explained.ru/">На главную</a>
            </p>
    <?php
            mysqli_close($dbc);
     ?>
    </body>

    </html>
