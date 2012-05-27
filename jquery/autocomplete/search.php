<?php

$q = $_GET["term"];

mysql_connect("localhost", "root", "");
mysql_select_db("testing");

$query = mysql_query("SELECT name FROM states WHERE name LIKE '$q%'");

$data = array();

while($row = mysql_fetch_array($query))
{
	$data[] = array('value'=>$row['name']);
}

echo json_encode($data);

?>