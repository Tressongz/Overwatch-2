<?php
//Задание страниц в виде переменных:
//Главная страница
            $main_page = '/index.php';
//Страница публикации  (новость, статья, новое, внимание, обновление и т.д.)
            $news_page = '/news.php';
//Страницы героев (22)
            $hero_genji = '/hero/genji';
            $hero_reaper = '/hero/reaper';
            $hero_mccree = '/hero/mccree';
            $hero_soldier_76 = '/hero/soldier-76';
            $hero_tracer = '/hero/tracer';
            $hero_pharah = '/hero/pharah';
            $hero_bastion = '/hero/bastion';
            $hero_junkrat = '/hero/junkrat';
            $hero_mei = '/hero/mei';
            $hero_window_maker = '/hero/windowmaker';
            $hero_torbjorn = '/hero/torbjorn';
            $hero_hanzo = '/hero/hanzo';
            $hero_dva = '/hero/dva';
            $hero_zarya = '/hero/zarya';
            $hero_reinhardt = '/hero/reinhardt';
            $hero_roadhog = '/hero/roadhog';
            $hero_winston = '/hero/winston';
            $hero_ana = '/hero/ana';
            $hero_mercy = '/hero/mercy';
            $hero_zenyatta = '/hero/zenyatta';
            $hero_lucio = '/hero/lucio';
            $hero_symmetra = '/hero/symmetra';
//Страница поиска
            $search_page = '/search.php';
//Страница карт
            $maps_page = NULL;
//Страница героев
            $heroes_page = NULL;
//Пользовательская часть:
//Страница регистрации
            $registration_page = 'user/registration';
//Страница профиля
            $profile_page = 'user/profile';
//Проверка страниц на пренадлежность:
//Проверка главной страницы
    if ($_SERVER['PHP_SELF'] == $main_page) {
?>
        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, потасовки советы по игре и многое другое.">
        <meta name="keywords" content="overwatch, овервотч, новости, статьи, потасовки обзоры, обновления">
        <title>Overwatch-explained - новости, статьи, обновления, потасовки, обзоры по игре овервотч</title>
<?php
    }
//Проверка страниц публикаций
    if ($_SERVER['PHP_SELF'] == $news_page) {
        require('templates/db_connect.php');
        $news_id = mysqli_real_escape_string($dbc, trim(basename($_SERVER['REQUEST_URI'])));
        $query = "SELECT header, tags, content FROM news WHERE header_eng = '$news_id'";
        $result = mysqli_query($dbc, $query)
            or die('Извнините, возникла ошибка!');
        $row = mysqli_fetch_array($result);
        $header = $row['header'];
        $tags = $row['tags'];
        $content = mb_substr(strip_tags($row['content']), 0, 180, 'UTF-8').'...';
?>
        <meta name="description" content="<?php echo $content; ?>">
        <meta name="keywords" content="<?php echo $tags; ?>">
        <title>Overwatch - <?php echo $header; ?></title>
<?php
    }
//Проверка страницы героя - Гэндзи
    if ($_SERVER['REQUEST_URI'] == $hero_genji) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, гэндзи, гэнзи, genji, описание героя, обзор способностей, видео способностей, советы">
        <title>Гэндзи - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
<?php
    }
//Проверка страницы героя - Жнец
    if ($_SERVER['REQUEST_URI'] == $hero_reaper) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, жнец, reaper, описание героя, обзор способностей, видео способностей, советы">
        <title>Жнец - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
<?php
    }
//Проверка страницы героя - Маккри
    if ($_SERVER['REQUEST_URI'] == $hero_mccree) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, маккри, mccree, описание героя, обзор способностей, видео способностей, советы">
        <title>Маккри - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
<?php
    }
//Проверка страницы героя - Солдат-76
    if ($_SERVER['REQUEST_URI'] == $hero_soldier_76) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, солдат, солдат-76, soldier-76, soldier, описание героя, обзор способностей, видео способностей, советы">
        <title>Солдат-76 - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
<?php
    }
//Проверка страницы героя - Трейсер
    if ($_SERVER['REQUEST_URI'] == $hero_tracer) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, трейсер, tracer, описание героя, обзор способностей, видео способностей, советы">
        <title>Трейсер - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
<?php
    }
//Проверка страницы героя - Фарра
    if ($_SERVER['REQUEST_URI'] == $hero_pharah) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, фарра, pharah, описание героя, обзор способностей, видео способностей, советы">
        <title>Фарра - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
<?php
    }
//Проверка страницы героя - Бастион
    if ($_SERVER['REQUEST_URI'] == $hero_bastion) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, бастион, bastion, описание героя, обзор способностей, видео способностей, советы">
        <title>Бастион - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
   <?php
        }
//Проверка страницы героя - Крысавчик
        if ($_SERVER['REQUEST_URI'] == $hero_junkrat) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, крысавчик, junkrat, описание героя, обзор способностей, видео способностей, советы">
        <title>Крысавчик - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
<?php
    }
//Проверка страницы героя - Мэй
    if ($_SERVER['REQUEST_URI'] == $hero_mei) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, мэй, mei, описание героя, обзор способностей, видео способностей, советы">
        <title>Мэй - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
<?php
    }
//Проверка страницы героя - Роковая вдова
    if ($_SERVER['REQUEST_URI'] == $hero_window_maker) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, вдова, роковая вдова, windowmaker, описание героя, обзор способностей, видео способностей, советы">
        <title>Роковая вдова - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
<?php
    }
//Проверка страницы героя - Торбьорн
    if ($_SERVER['REQUEST_URI'] == $hero_torbjorn) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, torbjorn, торбьорн, описание героя, обзор способностей, видео способностей, советы">
        <title>Торбьорн - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
<?php
    }
//Проверка страницы героя - Хандзо
    if ($_SERVER['REQUEST_URI'] == $hero_hanzo) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, ханзо, хандзо, hanzo, описание героя, обзор способностей, видео способностей, советы">
        <title>Хандзо - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
<?php
    }
//Проверка страницы героя - D.Va
    if ($_SERVER['REQUEST_URI'] == $hero_dva) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, дива, два, dva, описание героя, обзор способностей, видео способностей, советы">
        <title>D.Va - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
<?php
    }
//Проверка страницы героя - Заря
    if ($_SERVER['REQUEST_URI'] == $hero_zarya) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, заря, zarya, описание героя, обзор способностей, видео способностей, советы">
        <title>Заря - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
<?php
    }
//Проверка страницы героя - Райнхардт
    if ($_SERVER['REQUEST_URI'] == $hero_reinhardt) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, райнхардт, reinhardt, рейнхарт, описание героя, обзор способностей, видео способностей, советы">
        <title>Райнхардт - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
<?php
    }
//Проверка страницы героя - Турбосвин
    if ($_SERVER['REQUEST_URI'] == $hero_roadhog) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, турбосвин, roadhog, описание героя, обзор способностей, видео способностей, советы">
        <title>Турбосвин - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
<?php
    }
//Проверка страницы героя - Уинстон
    if ($_SERVER['REQUEST_URI'] == $hero_winston) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, уинстон, winston, описание героя, обзор способностей, видео способностей, советы">
        <title>Уинстон - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
<?php
    }
//Проверка страницы героя - Ана
    if ($_SERVER['REQUEST_URI'] == $hero_ana) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, ана, ana, описание героя, обзор способностей, видео способностей, советы">
        <title>Ана - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
<?php
    }
//Проверка страницы героя - Ангел
    if ($_SERVER['REQUEST_URI'] == $hero_mercy) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, mercy, мерси, ангел, angel, описание героя, обзор способностей, видео способностей, советы">
        <title>Ангел - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
<?php
    }
//Проверка страницы героя - Дзенъятта
    if ($_SERVER['REQUEST_URI'] == $hero_zenyatta) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, зенъятта, дзенъятта, zenyatta, описание героя, обзор способностей, видео способностей, советы">
        <title>Дзенъятта - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
<?php
    }
//Проверка страницы героя - Лусио
    if ($_SERVER['REQUEST_URI'] == $hero_lucio) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, лусио, lucio, описание героя, обзор способностей, видео способностей, советы">
        <title>Лусио - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
<?php
    }
//Проверка страницы героя - Симметра
    if ($_SERVER['REQUEST_URI'] == $hero_symmetra) {
?>
<!--        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">-->
        <meta name="keywords" content="overwatch, овервотч, симметра, symmetra, описание героя, обзор способностей, видео способностей, советы">
        <title>Симметра - описание героя, обзор способностей, видео способностей, советы по игре овервотч</title>
<?php
    }

    if ($_SERVER['PHP_SELF'] == $search_page) {
?>
<!--
        <meta name="description" content="На данном сайте содержится информация для любителей игры Overwatch. Новости, статьи, обзоры, обновления, страницы героев, база знаний, советы по игре и многое другое.">
        <meta name="keywords" content="overwatch, овервотч, новости, статьи, обзоры, обновления">
-->
        <title>Поиск по сайту | Ищем: </title>
<?php
    }
    //Продолжение следует..
?>
