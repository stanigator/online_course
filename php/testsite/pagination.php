<?php

mysql_connect("localhost", "root", "") or die("Problem with connection");
mysql_select_db("testsite");

$per_page = 6;
$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
$start = ($page - 1) * $per_page;

$query = mysql_query("SELECT name FROM users LIMIT $start, $per_page");
$pages_query = mysql_query("SELECT COUNT('id') FROM users");
$pages = ceil(mysql_result($pages_query, 0) / $per_page);

while($query_row = mysql_fetch_assoc($query))
{
	echo $query_row['name']."<br />";
}

$prev = $page - 1;
$next = $page + 1;

if($page > 1)
	echo "<a href='?page=".$prev."'>Prev</a>&nbsp";

if($pages >= 1)
{
	for($x=1; $x<=$pages; $x++)
	{
		if($x == $page)
			echo "<a href='?page=".$x."'><b>".$x."</b></a>&nbsp";
		else
			echo "<a href='?page=".$x."'>".$x."</a>&nbsp";
	}
}

if($page < $pages)
	echo "<a href='?page=".$next."'>Next</a>&nbsp";

mysql_close();

?>
