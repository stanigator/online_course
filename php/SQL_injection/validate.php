<?php

$name = $_POST['name'];
$pw = mysql_real_escape_string(trim($_POST['password']));

mysql_connect('localhost', 'root', '') or die('We couldn\'t connect');
mysql_select_db('testsite');

$userpass = mysql_query("SELECT password FROM users where password='$pw'");
$count = mysql_num_rows($userpass);

if($count!=0)
	echo "You are in";
else
	echo "Incorrect password";

?>
