<?php
    //echo $_SERVER['REQUEST_URI'];
    if (basename($_SERVER['PHP_SELF'])=='' || basename($_SERVER['PHP_SELF'])=='index.php' || basename($_SERVER['PHP_SELF'])=='news.php' ||
    basename($_SERVER['PHP_SELF'])=='search.php') {
        $path = '';
    } else {
        $path = '../';
    }

    require_once($path.'templates/utilites.php');
    require_once($path.'templates/startsession.php');

    if (strpos($_SERVER['REQUEST_URI'], '/news.php?id=') !== false) {
        require($path.'templates/db_connect.php');

        if(!preg_match("/^[\d]*$/", $_GET['id'])) {
            echo '<p>Ошибка при обращении к блоку новостей[ng]</p>';
            exit();
        }
        $news_id = $_GET['id'];

        $query = "SELECT news.header_eng, ribbons.value_eng FROM news INNER JOIN ribbons ON news.ribbon = ribbons.ribbons_id WHERE news.id = $news_id";
        $result = mysqli_query($dbc, $query)
            or die("Извините, произошла ошибка запроса на сервер[nh]");
        $row = mysqli_fetch_array($result);

        if (mysqli_num_rows($result) == 1) {

        } else {
            if (mysqli_num_rows($result) == 0) {
                header('Location: http://'.$_SERVER['HTTP_HOST'].'/404');
            } else {
                echo '<p class="error">Извиняй, какая-то ошибка[nhcount]</p>';
                exit();
            }
        }
        $ribbon_eng = $row['value_eng'];
        $header_eng = $row['header_eng'];
        mysqli_close($dbc);
        header("HTTP/1.1 301 Moved Permanently");
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/'.$ribbon_eng.'/'.$header_eng);
    }
?>

    <!DOCTYPE html>
    <html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-type" content="text/html">
<?php
        require_once ($path.'scripts/php/seo_source.php');
?>
        <link rel="shortcut icon" href="/img/favicon/favicon..ico" type="image/x-icon">
        <link rel="stylesheet" href="<?php cssPath(); ?>">
        <script src="<?= levelDiff();?>js/jQuery-2.2.0-min.js"></script>
        <script src="<?=levelDiff();?>js/jquery-ui-1.12.0/jquery-ui.min.js"></script>
        <script src="<?=levelDiff();?>js/analytics.js"></script>
    </head>
    <body>
        <div class="main-block">
            <nav class="left-panel" id="main-nav-js">

                <div class="left-panel-list hidden" id="nav-list-js">
                    <div class="btn-nav btn-home">
                        <a href="<?= 'http://'.$_SERVER['HTTP_HOST'] ?>"></a>
                    </div>

                    <div class="btn-nav btn-search"></div>
                    <div class="btn-content btn-content-search hidden">
                        <div class="btn-content-search-text">
                            Что ищем?
                        </div>
                        <form class="search-form" method="get" action="<?= levelDiff();?>search.php">
                            <input type="search" placeholder="Поиск" class="nav-search" name="search">
                        </form>
                    </div>

                    <div class="btn-nav btn-heroes"></div>
                    <div class="btn-content btn-content-heroes hidden">
                        <div class="btn-content-heroes-text">
                            Герои Overwatch
                        </div>
                        <!--ul.heroes-list>li.heroes-item_$.heroesElem*21>.heroes-name-->
                        <ul class="heroes-list">

                            <li class="heroes-item_1">
                                <a href="<?php echo heroesLink();?>genji.php"><img src="http://overwatch-explained.ru/img/menu_heroes/genji.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        Гэндзи
                                    </div>
                                </a>
                            </li>


                            <li class="heroes-item_2">
                                <a href="<?php echo heroesLink();?>reaper.php"><img src="http://overwatch-explained.ru/img/menu_heroes/reaper.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        Жнец
                                    </div>
                                </a>
                            </li>


                            <li class="heroes-item_3">
                                <a href="<?php echo heroesLink();?>mccree.php"><img src="http://overwatch-explained.ru/img/menu_heroes/makkri.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        Маккри
                                    </div>
                                </a>
                            </li>


                            <li class="heroes-item_4">
                                <a href="<?php echo heroesLink();?>soldier-76.php"><img src="http://overwatch-explained.ru/img/menu_heroes/soldier-76.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        Солдат-76
                                    </div>
                                </a>
                            </li>


                            <li class="heroes-item_5">
                                <a href="<?php echo heroesLink();?>tracer.php"><img src="http://overwatch-explained.ru/img/menu_heroes/tracer.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        Трейсер
                                    </div>
                                </a>
                            </li>


                            <li class="heroes-item_6">
                                <a href="<?php echo heroesLink();?>pharah.php"><img src="http://overwatch-explained.ru/img/menu_heroes/farra.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        Фарра
                                    </div>
                                </a>
                            </li>


                            <li class="heroes-item_7">
                                <a href="<?php echo heroesLink();?>bastion.php"><img src="http://overwatch-explained.ru/img/menu_heroes/bastion.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        Бастион
                                    </div>
                                </a>
                            </li>


                            <li class="heroes-item_8">
                                <a href="<?php echo heroesLink();?>junkrat.php"><img src="http://overwatch-explained.ru/img/menu_heroes/krysavchik.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        Крысавчик
                                    </div>
                                </a>
                            </li>


                            <li class="heroes-item_9">
                                <a href="<?php echo heroesLink();?>mei.php"><img src="http://overwatch-explained.ru/img/menu_heroes/mehj.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        Мэй
                                    </div>
                                </a>
                            </li>


                            <li class="heroes-item_10">
                                <a href="<?php echo heroesLink();?>windowmaker.php"><img src="http://overwatch-explained.ru/img/menu_heroes/rokovaya_vdova.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        Роковая вдова
                                    </div>
                                </a>
                            </li>


                            <li class="heroes-item_11">
                                <a href="<?php echo heroesLink();?>torbjorn.php"><img src="http://overwatch-explained.ru/img/menu_heroes/torborn.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        Торбьорн
                                    </div>
                                </a>
                            </li>


                            <li class="heroes-item_12">
                                <a href="<?php echo heroesLink();?>hanzo.php"><img src="http://overwatch-explained.ru/img/menu_heroes/hanzo.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        Хандзо
                                    </div>
                                </a>
                            </li>


                            <li class="heroes-item_13">
                                <a href="<?php echo heroesLink();?>dva.php"><img src="http://overwatch-explained.ru/img/menu_heroes/dva.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        D.Va
                                    </div>
                                </a>
                            </li>


                            <li class="heroes-item_14">
                                <a href="<?php echo heroesLink();?>zarya.php"><img src="http://overwatch-explained.ru/img/menu_heroes/zarya.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        Заря
                                    </div>
                                </a>
                            </li>


                            <li class="heroes-item_15">
                                <a href="<?php echo heroesLink();?>reinhardt.php"><img src="http://overwatch-explained.ru/img/menu_heroes/rajnhardt.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        Райнхардт
                                    </div>
                                </a>
                            </li>


                            <li class="heroes-item_16">
                                <a href="<?php echo heroesLink();?>roadhog.php"><img src="http://overwatch-explained.ru/img/menu_heroes/turbosvin.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        Турбосвин
                                    </div>
                                </a>
                            </li>


                            <li class="heroes-item_17">
                                <a href="<?php echo heroesLink();?>winston.php"><img src="http://overwatch-explained.ru/img/menu_heroes/uinston.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        Уинстон
                                    </div>
                                </a>
                            </li>


                             <li class="heroes-item_18">
                                <a href="<?php echo heroesLink();?>ana.php"><img src="http://overwatch-explained.ru/img/menu_heroes/ana.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        Ана
                                    </div>
                                </a>
                            </li>

                            <li class="heroes-item_19">
                                <a href="<?php echo heroesLink();?>mercy.php"><img src="http://overwatch-explained.ru/img/menu_heroes/angel.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        Ангел
                                    </div>
                                </a>
                            </li>


                            <li class="heroes-item_20">
                                <a href="<?php echo heroesLink();?>zenyatta.php"><img src="http://overwatch-explained.ru/img/menu_heroes/dzenyatta.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        Дзенъятта
                                    </div>
                                </a>
                            </li>


                            <li class="heroes-item_21">
                                <a href="<?php echo heroesLink();?>lucio.php"><img src="http://overwatch-explained.ru/img/menu_heroes/lusio.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        Лусио
                                    </div>
                                </a>
                            </li>


                            <li class="heroes-item_22">
                                <a href="<?php echo heroesLink();?>symmetra.php"><img src="http://overwatch-explained.ru/img/menu_heroes/simmetra.PNG" width="60" height="60" />
                                    <div class="heroes-name">
                                        Симметра
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>

                    <div class="btn-nav btn-tournamets"></div>
                    <div class="btn-content btn-content-tournamets hidden">
                         <div class="btn-content-heroes-text">
                             Турниры
                        </div>
                        На данный момент никаких игр нет.
                    </div>
                    <div id="updown"></div>
                </div>
            </nav>

            <div class="content-wrapper">
                <a href="http://overwatch-explained.ru"><header class="main-header">
<!--
                    <h1>
                    <span class="title-style1">Overwatch</span>
                    <br>
                    <span class="title-style2">explained</span>
                </h1>
-->
                    <?php
                    //require_once($path.'templates/entry_point.php');

                ?>

                <div class="twitch-header">
                    <script src="http://player.twitch.tv/js/embed/v1.js"></script>
                    <div id="{PLAYER_DIV_ID}" class="twitch_player"></div>
                    <script type="text/javascript">
                        var options = {
                            width: 345,
                            height: 194,
                            channel: "{tressongz}",
                            autoplay: false
                            //video: "{VIDEO_ID}"
                        };
                        var player = new Twitch.Player("{PLAYER_DIV_ID}", options);
                        player.setVolume(0);
                    </script>
                </div>
                </header></a>
                <div class="content-zone">
