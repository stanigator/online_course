<?php

if(!isset($_SESSION['name']))
	session_start(); 

if(!isset($_SESSION['name']))
{
	echo "Access denied!";
	exit;
}
else
{
	include("session.php");
	echo "<h3>Choose an ID to edit:</h3><p>";

	mysql_connect("localhost", "root", "") or die("Problem with connection");
	mysql_select_db("testsite");

	$per_page = 6;
	$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
	$start = ($page - 1) * $per_page;

	$query = mysql_query("SELECT * FROM users LIMIT $start, $per_page");
	$pages_query = mysql_query("SELECT COUNT('id') FROM users");
	$pages = ceil(mysql_result($pages_query, 0) / $per_page);

	echo "<table width=\"90%\" align=center border=2>";
	echo "<tr><td width=\"40%\" align=center bgcolor=\"FFFF00\">ID</td>
	<td width=\"40%\" align=center bgcolor=\"FFFF00\">NAME</td>
	<td width=\"40%\" align=center bgcolor=\"FFFF00\">EMAIL</td>
	<td width=\"40%\" align=center bgcolor=\"FFFF00\">PASSWORD</td></tr>";

	while($row = mysql_fetch_assoc($query))
	{
		$id = $row["id"];
		$name = $row["name"];
		$email = $row["email"];
		$password = $row["password"];

		echo "<tr><td align=center>
		<a href=\"edit.php?ids=$id&names=$name&emails=$email&passwords=$password\">$id</a></td>
		<td>$name</td><td><a href=\"emailto.php?emails=$email\">$email</a></td><td>$password</td></tr>";
	} echo "</table>";

	$prev = $page - 1;
	$next = $page + 1;

	echo "<center>";
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
	echo "</center>";

	mysql_close();
	
}

?>
