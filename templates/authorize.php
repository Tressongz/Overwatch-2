<?php
  // User name and password for authentication
  $username = 'Darkm00n';
  $password = 'EnakenSkyWoker';

  if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
    ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
    // The user name/password are incorrect so send the authentication headers
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Overwatch-explained"');
    exit('<h2>Overwatch-explained</h2>
    <p>Извините, но Вы должны ввести коректные имя пользователя и пароль для доступа к этой странице.</p>');
  }
?>
