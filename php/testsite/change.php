<?php

$id = $_REQUEST['id'];
$newname = $_REQUEST['newname'];
$newemail = $_REQUEST['newemail'];
$newpw = $_REQUEST['newpassword'];

mysql_connect("localhost", "root", "") or die("We couldn't connect!");
mysql_select_db("testsite");

mysql_query("UPDATE users SET name='$newname', email='$newemail', password='$newpw' WHERE id='$id'") or die(mysql_error());

echo "Your values have been updated successfully!";

mysql_close();

include('links.php');

?>
