<?php
header("Content-Type:application/json;charset=utf-8");

function set_php_file($path, $content){
	$fp = fopen($path, "w");
	fwrite($fp, "<?php exit();?>" . $content);
	fclose($fp);	
}

function get_php_file($filename) {
    return trim(substr(file_get_contents($filename), 15));
}

$campaign = $_REQUEST["campaign"];
$third = $_POST["third"];
$platform = $_POST["platform"];
$url = $_POST["url"];


$msg = array();
//$msg['idx'] = $campaign;
$msg['campaign'] = $campaign;
$msg['third'] = $third;
$msg['platform'] = $platform;
$msg['url'] = $url;


$msg_arr = json_decode(get_php_file("../data/url.php"), JSON_UNESCAPED_UNICODE);
array_push($msg_arr, $msg);


set_php_file("../data/url.php", json_encode($msg_arr, JSON_UNESCAPED_UNICODE));


echo get_php_file("../data/url.php");






?>