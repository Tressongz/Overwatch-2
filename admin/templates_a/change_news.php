<?php
    require_once('templates_a/header_a.php');
?>
    <h5>Изменение новости</h5>
    <?php
            require_once('../templates/db_connect.php');
            if (isset($_GET['id'])) {
                $id_news = $_GET['id'];
                $where_is_save = $_GET['content'];
            }
            if (isset($_POST['submit'])) {
                $id_news = $_POST['id_news'];
                $where_is_save = ($_POST['where_is_save']==1)? 'news' : (($_POST['where_is_save']==2)? 'articles' : '');

                $header = $_POST['header_news'];
                $tags = $_POST['tags_news'];
                $ribbon = $_POST['ribbon_news'];
                $main_picture = $_POST['main_picture_news'];
                $content = $_POST['content_news'];

                $query = "UPDATE $where_is_save SET header='$header', tags='$tags', ribbon='$ribbon', main_picture='$main_picture', content='$content' WHERE id='$id_news'";

                mysqli_query($dbc, $query)
                    or die('Ошибка при передаче POST-данных');
                echo '<p class="goodJob">Поздравляю, новость изменена!</p>';
            }

            $query = "SELECT * FROM news WHERE id='$id_news'";
            $result = mysqli_query($dbc, $query)
                or die("Извините, произошла ошибка запроса на сервер");
            $row = mysqli_fetch_array($result);

            if ($row != NULL) {
                $header = $row['header'];
                $tags = $row['tags'];
                $ribbon = $row['ribbon'];
                $main_picture = $row['main_picture'];
                $content = $row['content'];
            } else {
                echo '<p class="error">Извиняй, какая-то ошибка.</p>';
                exit();
            }
            mysqli_close($dbc);
        ?>
        <form action="change_news.php" method="post">
            <label for="header_news">Шапка новости: </label>
            <input type="text" id="header_news" name="header_news" value="<?php echo $header; ?>">
            <br>

            <label for="tags_news">Теги: </label>
            <input type="text" id="tags_news" name="tags_news" value="<?php echo $tags; ?>">
            <br>

            <label for="ribbon_news">Ленточка: </label>
            <input type="text" id="ribbon_news" name="ribbon_news" value="<?php echo $ribbon; ?>">
            <br>

            <label for="main_picture_news">Главное изображение: </label>
            <input type="text" id="main_picture_news" name="main_picture_news" value="<?php echo $main_picture; ?>">
            <?php require_once('templates_a/img_viewer.php'); ?>
            <br>

            <label for="content_news">Содержание новости: </label>
            <textarea id="content_news" name="content_news"><?php echo $content; ?></textarea>
            <br>

            <input type="hidden" name="id_news" value="<?php echo $id_news; ?>">
            <input type="hidden" name="where_is_save" value="<?php echo $where_is_save; ?>">

            <input type="submit" name="submit" value="Сохранить">
        </form>

        <?php
    require_once('templates_a/footer_a.php');
?>
