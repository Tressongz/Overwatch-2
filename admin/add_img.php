<?php
    require_once('templates_a/header_a.php');
    define('GW_UPLOADPATH', '../img/content/');
    define('IMG_WIDTH', 400);
    define('IMG_HEIGHT', 300);
?>
    <h5>Добавление изображения в галерею</h5>
    <?php
            if (isset($_POST['submit'])) {

                $screenshot = $_FILES['screenshot']['name'];
                $screenshot_type = $_FILES['screenshot']['type'];
                $screenshot_size = $_FILES['screenshot']['size'];
                $file_name = $_POST['file_name'];

                if (!empty($screenshot)) {
                    if ((($screenshot_type == 'image/gif') || ($screenshot_type == 'image/jpeg') || ($screenshot_type == 'image/pjpeg') || ($screenshot_type == 'image/png')) && ($screenshot_size > 0)) {
                        if ($_FILES['screenshot']['error'] == 0) {
                            if (!empty($file_name)) {
                                $target = GW_UPLOADPATH . $file_name;
                              } else {
                                $target = GW_UPLOADPATH . $screenshot;
                              }
                              $thumb = imagecreatetruecolor(IMG_WIDTH, IMG_HEIGHT);
                          //$source = file_get_contents($_FILES['screenshot']['tmp_name']);
                            switch($screenshot_type) {
                                case 'image/jpeg':
                                    $source = imagecreatefromjpeg($_FILES['screenshot']['tmp_name']);
                                    break;
                                case 'image/png':
                                    $source = imagecreatefrompng($_FILES['screenshot']['tmp_name']);
                                    break;
                                case 'image/gif':
                                    $source = imagecreatefromgif($_FILES['screenshot']['tmp_name']);
                                    break;
                                default:
                                    echo 'Что за фигню ты сюда грузишь?';
                                    die;
                            }

                            $info = getimagesize($_FILES['screenshot']['tmp_name']);
                            $width = $info[0];
                            $height = $info[1];
                            imagecopyresampled($thumb, $source, 0, 0, 0, 0, IMG_WIDTH, IMG_HEIGHT, $width, $height);

                              //if (move_uploaded_file($thumb, $target)) {
                            switch($screenshot_type) {
                                case 'image/jpeg':
                                    $result = imagejpeg($thumb, $target);
                                    break;
                                case 'image/png':
                                    $result = imagepng($thumb, $target);
                                    break;
                                case 'image/gif':
                                    $result = imagegif($thumb, $target);
                                    break;
                                default:
                                    echo 'Что за фигню ты сюда грузишь?';
                                    die;
                                }
                            if ($result) {
                                echo '<p class="goodJob">Изображение загружено</p>';
                            } else {
                                echo '<p class="error">Сервер не позволил</p>';
                            }
                        } else {
                            echo '<p class="error">Ошиибка FILES</p>';
                        }
                    } else {
                        echo '<p class="error">Формат не тот</p>';
                    }
                } else {
                    echo '<p class="error">Файл не добавил</p>';
                }
            }
        ?>
        <form action="add_img" method="post" enctype="multipart/form-data">
            <label for="file_name">Введи сюда желаемое имя файла, или оставь пустым (про правильное разрешение не забудь):</label>
            <input type="text" name="file_name" id="file_name">
            <br>
            <input type="file" name="screenshot">
            <input type="submit" name="submit" value="Загрузить">
        </form>

        <?php
    require_once('templates_a/footer_a.php');
?>
