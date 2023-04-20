<?php
    require_once('templates_a/header_a.php');
    require_once('templates_a/editable_news.php');
?>
    <div class="admin-panel" id="resizable">
        <h5>Изменение новости</h5>
        <?php
            require_once('../templates/db_connect.php');
            if (isset($_GET['id'])) {
                $id_news = $_GET['id'];
                $where_is_save = ($_GET['content']==1)? 'news' : (($_GET['content']==2)? 'articles' : '');
            }
            if (isset($_POST['submit'])) {
                $id_news = $_POST['id_news'];
                $where_is_save = $_POST['where_is_save'];

                $header = $_POST['header_news'];
                $tags = $_POST['tags_news'];
                $ribbon = $_POST['ribbon_news'];
                $main_picture = $_POST['main_picture_news'];
                $content = $_POST['content_news'];
                $translite = toTranslite($_POST['header_news']);

                $query = "UPDATE $where_is_save SET header='$header', tags='$tags', ribbon='$ribbon', main_picture='$main_picture', content='$content', header_eng='$translite' WHERE id='$id_news'";

                mysqli_query($dbc, $query)
                    or die('Ошибка при передаче POST-данных');
                echo '<p class="goodJob">Поздравляю, новость изменена!</p>';
            }

            $query = "SELECT * FROM $where_is_save WHERE id='$id_news'";
            $result = mysqli_query($dbc, $query)
                or die("Извините, произошла ошибка запроса на сервер");
            $row = mysqli_fetch_array($result);

            if ($row != NULL) {
                $header = $row['header'];
                $tags = $row['tags'];
                $ribbon = $row['ribbon'];
                $main_picture = $row['main_picture'];
                $content = $row['content'];
                $translite = $row['header_eng'];
            } else {
                echo '<p class="error">Извиняй, какая-то ошибка.</p>';
                exit();
            }
        ?>


            <form action="change_news?id=<?php echo $id_news; ?>&content=<?php echo $_GET['content']; ?>" method="post" class="admin-form"> <!-- onkeydown="if(event.keyCode==13){return false;}" -->
                <div class="content-section">
                    <label for="header_news">Шапка новости: </label>
                    <input type="text" id="header_news" name="header_news" value="<?php echo $header; ?>">
                    <br>

                    <label for="content_news">Содержание новости: </label>
                    <textarea name="content_news" id="content_news" cols="80" rows="10">
                        <?php echo $content; ?>
                    </textarea>
                    <br>
                </div>
                <div class="additionally-section">
                    <label for="tags_news">Теги: </label>
                    <input type="text" id="tags_news" name="tags_news" value="<?php echo $tags; ?>">
                    <br>

                    <label for="ribbon_news">Ленточка: </label>
                    <div class="tag-r-admin"></div>
                    <select size="1" id="ribbon_news" name="ribbon_news" autocomplete="off">
                        <?php
                            $query = "SELECT * FROM ribbons";
                            $result_r = mysqli_query($dbc, $query)
                                or die("Извините, произошла ошибка запроса на сервер");
                            while ($row_r = mysqli_fetch_array($result_r)) {
                                if ($ribbon != $row_r['ribbons_id']) {
                                    echo '<option value="'.$row_r['ribbons_id'].'" class="'.$row_r['value_css'].'">'.$row_r['value'].'</option>';
                                } else {
                                    echo '<option value="'.$row_r['ribbons_id'].'" class="'.$row_r['value_css'].'" selected="selected">'.$row_r['value'].'</option>';
                                }
                            }
                        ?>
                    </select>
                    <br>

                    <label for="main_picture_news">Главное изображение: </label>
                    <input type="text" id="main_picture_news" name="main_picture_news" value="<?php echo $main_picture; ?>">
                    <?php require_once('templates_a/img_viewer.php'); ?>
                    <br>



                        <input type="submit" name="submit" value="Сохранить">
                </div>

                <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
                <input type="hidden" name="where_is_save" value="<?php echo $where_is_save; ?>">
                <input type="hidden" name="id_news" value="<?php echo $id_news; ?>">


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
    mysqli_close($dbc);
    require_once('templates_a/footer_a.php');
?>
