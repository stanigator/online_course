<?php

$name = $_POST['name'];
$pw = $_POST['password'];

if($name && $pw)
{
	mysql_connect("localhost", "root", "") or die("Problem with connection");
	mysql_select_db("testsite");

	$query = mysql_query("SELECT * FROM users WHERE name='$name'");
	$numrows = mysql_num_rows($query);

	if($numrows != 0)
	{
		while($row = mysql_fetch_assoc($query))
		{
			$dbname = $row['name'];
			$dbpw = $row['password'];

			if($name == $dbname)
			{
				if(md5($pw) == $dbpw)
					header("location: users.php");
				else
					echo "Your password is incorrect!";
			}
			else
				echo "Your name is incorrect!";
		}
	}
	else
		echo "The name is not registered";
	
	mysql_close();
}
else
	echo "You have to type a name and password!";

?>
