<?php
    include 'simple_html_dom.php';
    $data = file_get_html ('http://egb.com/tables');
    $day_and_time = $data ->find();
    $team_first = $data ->find();
    $country_first = $data ->find();
    $index_first = $data ->find();

    $team_second = $data ->find();
    $country_second = $data ->find();
    $index_second = $data ->find();

    $event = $data ->find();

?>
