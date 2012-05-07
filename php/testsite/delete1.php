<?php

mysql_connect("localhost", "root", "") or die("Problem with connection");

mysql_select_db("testsite");

$result = mysql_query("SELECT * FROM users WHERE id='".$_REQUEST['ids']."'");

echo "<table width=\"90%\" align=center border=2>";
echo "<tr><td width=\"40%\" align=center bgcolor=\"FFFF00\">ID</td>
<td width=\"40%\" align=center bgcolor=\"FFFF00\">NAME</td>
<td width=\"40%\" align=center bgcolor=\"FFFF00\">EMAIL</td>
<td width=\"40%\" align=center bgcolor=\"FFFF00\">PASSWORD</td></tr>";

while($row = mysql_fetch_array($result))
{
	$id = $row["id"];
	$name = $row["name"];
	$email = $row["email"];
	$password = $row["password"];

	echo "<tr><td align=center></td>
	<td>$name</td><td>$email</td><td>$password</td></tr>";
} echo "</table>";

mysql_close();

?>

<form method="POST" action="delete2.php">
<p>Are you sure you want to delete this user
<input type="submit" name="submit" value="OK" />
<input type="hidden" name="id" value="<?php echo $_REQUEST['ids']; ?>" />
</form>

<center><h3><?php include("links.php"); ?></h3></center>

