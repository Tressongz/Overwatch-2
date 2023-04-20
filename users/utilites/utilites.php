<?php
function submit($name = '', $value = 'Сохранить') {
    echo '<input type="submit" value="'.$value.'" name="'.$name.'" class="form-btn">';
}

function withoutPHP ($query_url) {
    $position = strpos($query_url, '.');
    $new_url = substr($query_url, 0, $position);
    return $new_url;
}

function errorLabel($msg) {
    echo '<label class="form_item_error">'.$msg.'</label>';
}
