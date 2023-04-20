<?php
    function levelDiff() {
        if (basename($_SERVER['PHP_SELF'])=='' || basename($_SERVER['PHP_SELF'])=='index.php' || basename($_SERVER['PHP_SELF'])=='news.php' || basename($_SERVER['PHP_SELF'])=='search.php') {
            return '../';
        } else {
            return '../../';
        }
    }


    function cssPath() {
        switch(basename($_SERVER['SCRIPT_NAME'])) {
            case '':
            case 'index.php':
            case 'search.php':
                echo 'css/news.css';
                break;
            case 'genji.php':
            case 'ana.php':
            case 'bastion.php':
            case 'dva.php':
            case 'hanzo.php':
            case 'junkrat.php':
            case 'lucio.php':
            case 'mccree.php':
            case 'mei.php':
            case 'mercy.php':
            case 'pharah.php':
            case 'reaper.php':
            case 'reinhardt.php':
            case 'roadhog.php':
            case 'soldier-76.php':
            case 'symmetra.php':
            case 'torbjorn.php':
            case 'tracer.php':
            case 'windowmaker.php':
            case 'winston.php':
            case 'zarya.php':
            case 'zenyatta.php':
            case 'new_hero.php':
                echo '../css/hero.css';
                break;
            case 'news.php':
                echo '../css/single_news.css';
                break;
            case 'auth.php':
                echo '../css/auth.css';
                break;

            //case 'news'

            default:
                echo 'css/main.css';
        }
    }

    function heroesLink() {
        switch(basename($_SERVER['PHP_SELF'])) {
            case '':
            case 'index.php':
            case 'news.php':
            case 'search.php':
                echo 'http://'.$_SERVER['HTTP_HOST'].'/hero/';
                break;
            default:
                echo '';
        }
    }

    function tagsOutput($string_tags) {
        $arr_tags = explode(", ", $string_tags);
        foreach ($arr_tags as $tag) {
            if ($tag == end($arr_tags)) {
                echo '<a href="http://'.$_SERVER['SERVER_NAME'].'/search.php?search='.$tag.'">'.$tag.'</a>';
            } else {
                echo '<a href="http://'.$_SERVER['SERVER_NAME'].'/search.php?search='.$tag.'">'.$tag.'</a>, ';
            }
        }
    }

    function addView($dbc, $news_id) { //$dbc - соединение с базой данных
        $user_ip = ip2long($_SERVER['REMOTE_ADDR']); //преобразует в int
        $date = date('Y-m-d');
        $query_views = "SELECT views_id FROM views WHERE news_id = $news_id AND user_ip = '$user_ip'";
        $result_views = mysqli_query($dbc, $query_views)
            or die("Извините, произошла ошибка запроса на сервер");
        if (mysqli_num_rows($result_views) == 0) {
            $query_add_views = "INSERT INTO views (user_ip, news_id, views_date) VALUES ('$user_ip', '$news_id', '$date')";
            mysqli_query($dbc, $query_add_views);

            $query_add_total_views = "SELECT views FROM news WHERE id = $news_id";
            $result_views = mysqli_query($dbc, $query_add_total_views)
                or die("Извините, произошла ошибка запроса на сервер");
            $row_views = mysqli_fetch_array($result_views);
            $total_views = $row_views['views'];
            $total_views++;

            $query_add_total_views = "UPDATE news SET views = $total_views WHERE id = $news_id";
            mysqli_query($dbc, $query_add_total_views)
                or die("Извините, произошла ошибка запроса на сервер");
        }
    }

    function splitQuery($user_query) {
        $search_query = "SELECT id, header, content, tags FROM news ";
        $query_words = preg_split("/[ ,+-_\/\\\'\".]+/", $user_query, -1, PREG_SPLIT_NO_EMPTY);

        if (count($query_words) > 0) {
            foreach ($query_words as $word) {
                $where_list[] = "content LIKE '% $word %'";//tags, header, content
                $where_list[] = "tags LIKE '%$word%'";
                $where_list[] = "header LIKE '% $word %'";
            }
            $where_clause = implode(' OR ', $where_list);
            if (!empty($where_clause)) {
                $search_query .= "WHERE $where_clause";
                return $search_query;
            }
        }

           return '';
    }

    function deleteAllImgs($text) {
        return strip_tags($text, '<p><a><br>');
    }
    function rdate($param, $time=0) {
        if(intval($time)==0)$time=time();
        $MonthNames=array("Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря");
        if(strpos($param,'M')===false) return date($param, $time);
            else return date(str_replace('M',$MonthNames[date('n',$time)-1],$param), $time);
    }
    function deleteSpaces($string) {
        $deleteIndex = 0;
        for ($i=0; mb_strlen($string, 'UTF-8')>$i; ++$i) {
            if ($string[$i] === ' ') {
                $deleteIndex++;
            } else {
                break;
            }
        }
        $string = mb_substr($string, 0, $deleteIndex);
        $deleteIndex = 0;

        for ($i=mb_strlen($string, 'UTF-8'); $i>0; --$i) {
            if ($string[$i] === ' ') {
                $deleteIndex++;
            } else {
                break;
            }
        }
        $string = mb_substr($string, mb_strlen($string, 'UTF-8') - $deleteIndex);
        return $string;
    }

    function posWordRegister($content, $word) {
        $firts_letter = mb_strtoupper(mb_substr($word, 0, 1, 'UTF-8'), 'UTF-8');
        $word_low = mb_strtolower($word, 'UTF-8');
        $cut_word = mb_strcut($word, 1, 100, 'UTF-8');
        $word_up = $firts_letter . $cut_word;

        if ($position = mb_strpos($content, $word_low, 0, 'UTF-8')) {
            return $position;
        }
        if ($position = mb_strpos($content, $word_up, 0, 'UTF-8')) {
            return $position;
        }
        return false;
    }

    function checkBDDate($day, $month, $year) {
        if (empty($day)) $day = 1;
        if (empty($month)) $month = 1;
        if (empty($year)) $year = 2012;
        if (!(is_numeric($day) && is_numeric($month) && is_numeric($year)))
            return "Вводить необходимо только числа.";
        if (mb_strlen($year) != 4)
            return "Год должен быть в формате четырёх чисел.";
        if ((int)$year < 1900)
            return "А Вы довольно стары!";
        if ((int)$year > (int)date('Y'))
            return "Вы слишком молоды (вернее, у Вас всё впереди).";
        if ((int)$month < 1 || (int)$month > 12)
            return "Такого месяца не существует.";
        $febrary = date("L", mktime(0, 0, 0, 7, 1, $year))? 29 : 28;
        $daysCount = [31, $febrary, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        if ((int)$day < 1 || (int)$day > $daysCount[$month-1])
            return "Такого дня не существует.";
        return true;
    }

    function dateToString($day, $month, $year) {
        if ($day === '') $day = 'nn';
        if ($month === '') $month = 'nn';
        if ($year === '') $year = 'nnnn';

        if (mb_strlen($day) === 1)
            $day = '0'.$day;
        if (mb_strlen($month) === 1)
            $month = '0'.$month;

        return $year.'-'.$month.'-'.$day;
    }

    function pagination($dbc, $page = 1, $ribbon = '') {
        $elemOnPage = 50;

        $query = 'SELECT news.id, news.header, news.tags, news.main_picture, news.content, news.post_date, news.views, news.likes, ribbons.value, ribbons.value_css FROM news INNER JOIN ribbons ON news.ribbon = ribbons.ribbons_id ';

        if ($ribbon != '') {
            $ribbon = mysqli_real_escape_string($dbc, trim($ribbon));
            $ribbonQuery = "SELECT ribbons_id FROM ribbons WHERE value_eng = '$ribbon'";
            $result = mysqli_query($dbc, $ribbonQuery)
                or die ('Произошла ошибка обращения к базе данных.');
            $row = mysqli_fetch_array($result);
            $ribbonId = $row['ribbons_id'];
            $query .= "WHERE news.ribbon = $ribbonId ";

            $countQuery = "SELECT COUNT(1) FROM news WHERE ribbon = $ribbonId";
        } else {
            $countQuery = "SELECT COUNT(1) FROM news";
        }

        $firtPostInPage = $elemOnPage * ($page - 1);
        $query .= "ORDER BY news.id DESC LIMIT $firtPostInPage, $elemOnPage";

        return ['query' => $query, 'count' => $countQuery];
    }
?>
