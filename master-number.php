<?php 
include __DIR__ . '/api/master-number-api.php';
// header("Content-Type: application/json; charset=UTF-8"); //ヘッダー情報の明記。必須。
// header('Access-Control-Allow-Origin: *');    // クロスオリジンでの取得を許可する
$name = filter_input(INPUT_POST, "name");
$masterNumberApi= new MasterNumberApi();
$num = $masterNumberApi->getMasterNumFromName($name);
echo $num;
//echo __DIR__ . '/api/master-number-api.php';
?>