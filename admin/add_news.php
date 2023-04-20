<?php
    require_once('templates_a/header_a.php');
    require_once('templates_a/editable_news.php');
    require_once('../templates/utilites.php');
?>
    <div class="admin-panel" id="resizable">
        <h5>Добавление новости</h5>
        <?php
            require_once('../templates/db_connect.php');
            $query = "SELECT * FROM ribbons";
            $result = mysqli_query($dbc, $query)
                or die("Извините, произошла ошибка запроса на сервер");

            if (isset($_POST['submit'])) {

                    $header = $_POST['header_news'];
                    $tags = $_POST['tags_news'];
                    $ribbon = $_POST['ribbon_news'];
                    $main_picture = $_POST['main_picture_news'];
                    $content = $_POST['content_news'];
                    $post_date = $_POST['date'];
                    $where_it_save = $_POST['radio_news'];
                    $translite = toTranslite($_POST['header_news']);

                if (!empty($header) && !empty($tags) && !empty($ribbon) && !empty($main_picture) && !empty($content) && !empty($where_it_save)) {
                    $query = "INSERT INTO $where_it_save (header, tags, ribbon, main_picture, content, post_date, header_eng) VALUES ('$header', '$tags', '$ribbon', '$main_picture', '$content', '$post_date', '$translite')";

                    mysqli_query($dbc, $query)
                        or die('Ошибка при передаче POST-данных');
                    echo '<p class="goodJob">Поздравляю, новость добавлена!</p>';
                    mysqli_close($dbc);
                } else {
                    echo '<p class="error">Какое-то из полей пусто!</p>';
                }
            }
        ?>



            <form action="add_news" method="post" class="admin-form"> <!-- onkeydown="if(event.keyCode==13){return false;}" -->
                <div class="content-section">
                    <label for="header_news">Шапка новости: </label>
                    <input type="text" id="header_news" name="header_news">
                    <br>

                    <label for="content_news">Содержание новости: </label>
<!--
                    <div id="content_news-field" contenteditable="true"></div>
                    <input type="hidden" id="content_news" name="content_news">
-->
                   <textarea name="content_news" id="content_news" cols="80" rows="10"></textarea>
                    <br>
                </div>
                <div class="additionally-section">
                    <label for="tags_news">Теги: </label>
                    <input type="text" id="tags_news" name="tags_news">
                    <br>

                    <label for="ribbon_news">Ленточка: </label>
                    <div class="tag-r-admin"></div>
                    <select size="1" id="ribbon_news" name="ribbon_news">
                         <?php
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<option value="'.$row['ribbons_id'].'" class="'.$row['value_css'].'">'.$row['value'].'</option>';
                            }
                        ?>
                    </select>
                    <br>

                    <label for="main_picture_news">Главное изображение: </label>
                    <input type="text" id="main_picture_news" name="main_picture_news">
                    <?php require_once('templates_a/img_viewer.php'); ?>
                        <br>

                    <label for="radio_news">Статья или новость: </label>
                    <br>
                    <input type="radio" id="radio_news" name="radio_news" value="news">Новость
                    <br>
                    <input type="radio" id="radio_news" name="radio_news" value="articles">Статья
                    <br>

                    <input type="submit" name="submit" value="Добавить">
                </div>

                <input type="hidden" name="date" value="<?php echo time(); ?>">


            </form>
    </div>
    <script>
        $(function () {
            $('#resizable').resizable({
                handles: "n"
            });
        });
    </script>

    <?php
    require_once('templates_a/footer_a.php');
?>
