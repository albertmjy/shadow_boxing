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

$idx = $_REQUEST["idx"] - 1;
$msg_arr = json_decode(get_php_file("../data/url.php"), JSON_UNESCAPED_UNICODE);

//unset($msg_arr[$idx]);
array_splice($msg_arr, $idx, 1);


set_php_file("../data/url.php", json_encode($msg_arr, JSON_UNESCAPED_UNICODE));

echo get_php_file("../data/url.php");


//$arr = array();
//$arr["idx"] = $idx
//
//echo $arr




?>