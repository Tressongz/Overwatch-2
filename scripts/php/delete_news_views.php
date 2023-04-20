<!DOCTYPE html>
    <html lang="ru">

    <head>
        <meta charset="UTF-8">
        <title>Overwatch-explained</title>
        <link rel="shortcut icon" href="/img/favicon/favicon.ico" type="image/x-icon">
    </head>
    <body>
 <?php
    require_once('../../templates/db_connect.php');
    $query = 'TRUNCATE TABLE views';
    $result = mysqli_query($dbc, $query)
        or die('Извини, твои записи не были удалены из базы данных, пожалуйста попробуй еще раз!');
    echo 'Твои данные успешно удалены, не благодари!';
?>
    </body>
</html>


