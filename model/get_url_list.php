<?php
header("Content-Type:application/json;charset=utf-8");

function get_php_file($filename) {
    return trim(substr(file_get_contents($filename), 15));
}


//$url_list = json_decode(get_php_file("../data/url.php"), JSON_UNESCAPED_UNICODE);

echo get_php_file("../data/url.php");






?>