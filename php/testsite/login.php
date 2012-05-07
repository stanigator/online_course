<?php

session_start();

if($_POST)
{
	$_SESSION['name'] = $_POST['name'];
	$_SESSION['password'] = $_POST['password'];
	if($_SESSION['name'] && $_SESSION['password'])
	{
		mysql_connect("localhost", "root", "") or die("Problem with connection");
		mysql_select_db("testsite");

		$query = mysql_query("SELECT * FROM users WHERE name='".$_SESSION['name']."'");
		$numrows = mysql_num_rows($query);

		if($numrows != 0)
		{
			while($row = mysql_fetch_assoc($query))
			{
				$dbname = $row['name'];
				$dbpw = $row['password'];

				if($_SESSION['name'] == $dbname)
				{
					if(md5($_SESSION['password']) == $dbpw)
					{
						if($_POST['remember'] == 'on')
						{
							$expire = time() + 86400;		// good for 24 hours
							setcookie('testsite', $_POST['name'], $expire);
						}
						header("location: enter.php");
					}
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
}
else
{
	echo "Access denied!";
	exit;
}

?>
