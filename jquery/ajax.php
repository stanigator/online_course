<?php

$name = $_REQUEST["username"];
$pw = $_REQUEST["password"];

$list = array('name'=>$name, 'password'=>$pw);

echo json_encode($list);

?>
