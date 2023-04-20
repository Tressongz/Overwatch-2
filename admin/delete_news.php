<?php
    require_once('templates_a/header_a.php');
?>
            <h5>Удаление новости</h5>
            <?php
            require_once('../templates/db_connect.php');
            if (isset($_GET['id'])) {
                $id_news = $_GET['id'];
                $where_is_save = ($_GET['content']==1)? 'news' : (($_GET['content']==2)? 'articles' : '');
            }
            if (isset($_POST['submit'])) {
                if ($_POST['confirm'] == 'Yes') {
                    $id_news = $_POST['id_news'];
                    $where_is_save = $_POST['where_is_save'];

                    $query = "DELETE FROM $where_is_save WHERE id='$id_news' LIMIT 1";

                    mysqli_query($dbc, $query)
                        or die('Ошибка при передаче POST-данных');
                        echo '<p class="goodJob">Поздравляю, новость удалена!</p>';
                } else {
                    header('Location: http://'.$_SERVER['SERVER_NAME'].'/death_star.php');
                    exit();
                }
            }

            $query = "SELECT header FROM $where_is_save WHERE id='$id_news'";
            $result = mysqli_query($dbc, $query)
                or die("Извините, произошла ошибка запроса на сервер");
            $row = mysqli_fetch_array($result);
            mysqli_close($dbc);
        ?>
                <form action="delete_news.php" method="post">
                    <input type="hidden" name="id_news" value="<?php echo $id_news; ?>">
                    <input type="radio" name="confirm" value="Yes">
                    Да, хочу
                    <input type="radio" name="confirm" value="No" checked="checked" />Нет, не хочу<br>

                    <input type="hidden" name="where_is_save" value="<?php echo $where_is_save; ?>">
                    <input type="submit" name="submit" value="Удалить">
                </form>

<?php
    require_once('templates_a/footer_a.php');
?>

