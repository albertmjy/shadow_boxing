<?php
header("Content-Type:application/json;charset=utf-8");

//$id = $_REQUEST["id"];
//$action = $_REQUEST["action"];

$msg = array();
//
$msg['tst'] = "life is not easy";


$fp = fopen("tt.php", "w");
fwrite($fp, "<?php exit();?>" . $msg);
fclose($fp);

echo json_encode($msg, JSON_UNESCAPED_UNICODE);



//echo "ddsdfss";

//phpinfo();

?>