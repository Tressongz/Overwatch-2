<?php
    require($path.'templates/db_connect.php');

    $query_sm = "SELECT sm_id FROM sm_current WHERE sm_index=1";
    $result_sm = mysqli_query($dbc,$query_sm)
        or die("Извините, произошла ошибка запроса на сервер[f1]");
    $row_sm = mysqli_fetch_array($result_sm);
    $sm_id = $row_sm['sm_id'];

    $query = "SELECT * FROM scrimmages WHERE SM_ID='$sm_id'";
    $result = mysqli_query($dbc, $query)
        or die("Извините, произошла ошибка запроса на сервер");

    $popular_query = 'SELECT id, header FROM news ORDER BY post_date LIMIT 5';
    $popular_result = mysqli_query($dbc, $popular_query)
        or die("Извините, произошла ошибка запроса на сервер[f2]");
?>
    <div class="right-aside">
        <aside class="right-panel">
            <div class="right-panel-item">
                <header class="right-panel-item-header">
                    Популярные публикации
                </header>
                <div class="right-panel-item-content">
                    <?php
                    while ($popular_row = mysqli_fetch_array($popular_result)) {
                ?>
                        <a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/news.php?id='.$popular_row['id'];?>">
                            <?php echo $popular_row['header']; ?>
                        </a>
                        <?php } ?>

                </div>
            </div>


            <div class="right-panel-item">
                <header class="right-panel-item-header">
                    Потасовка недели
                </header>
                <div class="right-panel-item-content">
                    <?php
            if ($row = mysqli_fetch_array($result)) {
                ?>
                        <div class="scrimmage">
                            <div class="scrimmage_icon"><div class="scrimmage_icon_border"><img width="200px" height="300px" src="/img/scrimmage/<?php echo $row['SM_ICON'];?>"></div></div>
                            <div class="scrimmage_title"><strong><?php echo $row['SM_NAME'];?></strong></div>
                            <div class="scrimmage_description">"<?php echo $row['SM_DESCRIPTION'];?>"
                                    <br>
                                    <button class="scrimmage_rules_btn  scrimmage_button">Правила</button>
                                    <button class="scrimmage_review_btn  scrimmage_button">Рецензия</button>
                            </div>

                            <ul class="scrimmage_rules hidden">
                                <?php
                                    if($row['SM_HEROES']!=NULL) {
                                ?>
                                    <li class="scrimmage_rules_heroes">Герои:
                                        <?php echo $row['SM_HEROES'];?>
                                    </li>
                                    <?php
                                    }
                                    if ($row['SM_HEALTH']!=0) {
                                ?>
                                        <li class="scrimmage_rules_health">
                                            <?php echo $row['SM_HEALTH'];?>% здоровья</li>
                                        <?php
                                    }
                                    if($row['SM_RECOVERY']!=0) {
                                ?>
                                            <li class="scrimmage_rules_spells">
                                               <?php echo $row['SM_RECOVERY'];?>% к восстановлению способностей
                                                </li>
                                            <?php
                                    }
                                    if($row['SM_POWER']!=0) {
                                ?>
                                                <li class="scrimmage_rules_superspells">
                                                    <?php echo $row['SM_POWER'];?>% к зарядке суперспособностей</li>
                                                <?php
                                    }
                                    if($row['SM_MAPS']!=NULL) {
                                ?>
                                                    <li class="scrimmage_rules_maps">Поле боя:
                                                        <?php echo $row['SM_MAPS'];?>
                                                    </li>
                                                    <?php
                                    }
                                    if($row['SM_MEMBERS']!=0) {
                                 ?>
                                                        <li class="scrimmage_rules_members">Размер команды:
                                                            <?php echo $row['SM_MEMBERS'];?>
                                                        </li>
                                                        <?php
                                    }
                                    if($row['SM_TIME']!=0) {
                                ?>
                                                            <li class="scrimmage_rules_time">Длительность матча в минутах:
                                                                <?php echo $row['SM_TIME'];?>
                                                            </li>
                                                            <?php
                                    }
                                    if($row['SM_MORE_INFO']!=NULL) {
                                ?>
                                                                <li class="scrimmage_rules_more_info">Дополнительное условие:
                                                                    <?php echo $row['SM_MORE_INFO'];?>
                                                                </li>
                                                                <?php
                                    }
                                ?>
                            </ul>

                            <div class="scrimmage_review hidden">
                                <p>
                                    <?php echo $row['SM_REVIEW']; ?>
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                ?>
                </div>
            </div>

        </aside>
    </div>
    </div>
    <!--Подвал сайта-->
    <footer class="main-footer">

        <div class="main-footer-item main-footer-login">
               <?php
                if (!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) {
            ?>
            <a class="button-footer" href="<?= 'http://'.$_SERVER['HTTP_HOST'].'/users/auth' ?>">Войти</a>
            <a class="button-footer" href="<?= 'http://'.$_SERVER['HTTP_HOST'].'/users/registration' ?>">Регистрация</a>
            <?php
                } else {
            ?>
            <a class="button-footer" href="<?= 'http://'.$_SERVER['HTTP_HOST'].'/users/profile' ?>">Профиль</a>
            <a class="button-footer" href="<?= 'http://'.$_SERVER['HTTP_HOST'].'/users/logout' ?>">Выйти</a>
            <?php
                }
            ?>
        </div>

        <div class="main-footer-item">
            Разделы сайта
            <ul>
                <li class="link-pager"><a href="">Герои</a></li>
                <li class="link-pager"><a href="">Карты</a></li>
                <li class="link-pager"><a href="">Статьи</a></li>
            </ul>
        </div>

        <div class="main-footer-item main-footer-about">
            О сайте
            <p class="footer-text">На сайте находится полезная информация по игре Overwatch, а также интересные новости, статьи и обзоры новинок.</p>
            <p class="footer-text">По вопросам и сотрудничеству можете обращаться по адрессу: support@overwatch-explained.ru</p>
            <p class="footer-text">Спасибо за инонки дизайнеру <a  class="footer-autor" href="http://www.flaticon.com/authors/freepik/2">Freepik</a>.</p>
        </div>


        <div class="main-footer-item">
            Мы также здесь:
            <div class="footer-icons">
                <a href="http://vk.com/overwatch_explained" class="vk-link"></a>
                <a href="https://www.youtube.com/channel/UCG0YFWhcw6DZfdlc5hq-0aA" class="youtube-link"></a>
                <a href="https://twitter.com/OW_Explained" class="twitter-link"></a>
                <a href="https://www.twitch.tv/tressongz" class="twitch-link"></a>
            </div>
        </div>

        <!--LiveInternet counter-->
        <div class="main-footer-item main-footer-stats">
            <script type="text/javascript">
                document.write("<a href='//www.liveinternet.ru/click' " +
                    "target=_blank><img src='//counter.yadro.ru/hit?t44.6;r" +
                    escape(document.referrer) + ((typeof (screen) == "undefined") ? "" :
                        ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ?
                            screen.colorDepth : screen.pixelDepth)) + ";u" + escape(document.URL) +
                    ";" + Math.random() +
                    "' alt='' title='LiveInternet' " +
                    "border='0' width='31' height='31'><\/a>");
            </script>
        </div>
        <!--/LiveInternet-->
        <?php
    mysqli_close($dbc);
?>


    </footer>

    </div>
    </div>

    <script src="<?php echo levelDiff(); ?>js/nav-btn-click.js"></script>
    <script src="<?php echo levelDiff(); ?>js/updown.js"></script>
    <script src="<?php echo levelDiff(); ?>js/sm_rules-btn.js"></script>
    <script src="<?php echo levelDiff(); ?>js/heroes.js"></script>
    </body>

    </html>
