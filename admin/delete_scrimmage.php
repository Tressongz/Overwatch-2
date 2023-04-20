<?php
    require_once('templates_a/header_a.php');
    require_once('../templates/db_connect.php');

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            if (isset($_POST['submit'])) {
                if ($_POST['confirm'] == 'Yes') {
                    $id = $_POST['SM_ID'];

                    $query = "DELETE FROM scrimmages WHERE SM_ID='$id' LIMIT 1";

                    mysqli_query($dbc, $query)
                        or die('Ошибка при передаче POST-данных');
                        echo '<p class="goodJob">Поздравляю, потасовка удалена!</p>';
                } else {
                    header('Location: http://'.$_SERVER['SERVER_NAME'].'/death_star.php');
                    exit();
                }
            }

            $query = "SELECT SM_NAME FROM scrimmages WHERE SM_ID='$id'";
            $result = mysqli_query($dbc, $query)
                or die("Извините, произошла ошибка запроса на сервер");
            $row = mysqli_fetch_array($result);
            echo ('Удаление потасовки: ' .$row['SM_NAME'].'<br><br>');
            mysqli_close($dbc);
        ?>
                <form action="delete_scrimmage.php" method="post">
                    <input type="hidden" name="SM_ID" value="<?php echo $id; ?>">
                    <input type="radio" name="confirm" value="Yes">
                    Да, хочу
                    <input type="radio" name="confirm" value="No" checked="checked" />Нет, не хочу<br>

                    <input type="submit" name="submit" value="Удалить">
                </form>
<?php
    require_once('templates_a/footer_a.php');
?>
