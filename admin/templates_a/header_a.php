<?php
    require_once('../templates/authorize.php');

    function toTranslite($text_rus) {
        $words = [
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g',
            'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k',
            'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
            'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shh', 'ы' => 'y',
            'ь' => '\'', 'э' => 'je', 'ю' => 'yu', 'я' => 'ya'
        ];
        $text_rus = mb_strtolower($text_rus, 'UTF-8');
        $tr_text = '';
        for ($i=0; mb_strlen($text_rus, 'UTF-8')>$i; ++$i) {
            if (mb_substr($text_rus, $i, 1, 'UTF-8') == ' ') {
                $tr_text .= '_';
                continue;
            }
            foreach ($words as $rus => $eng) {
                if (mb_substr($text_rus, $i, 1, 'UTF-8') == $rus) {
                    $tr_text .= $eng;
                    break;
                }
            }
        }
        return $tr_text;
    }
?>
    <!DOCTYPE html>
    <html lang="ru">

    <head>
        <meta charset="UTF-8">
        <title>Overwatch-explained</title>
        <link rel="shortcut icon" href="/img/favicon/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="../js/jquery-ui-1.12.0/jquery-ui.min.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="../ckeditor/ckeditor.js"></script>
    </head>

    <body>
        <h3>Добро пожаловать в админку Overwatch-explained</h3>
