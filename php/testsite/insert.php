<?php

$name = mysql_real_escape_string($_POST["name"]);
$email = mysql_real_escape_string($_POST["email"]);
$pw = mysql_real_escape_string($_POST["password"]);
$cpw = mysql_real_escape_string($_POST["cpassword"]);

if ($name && $email && $pw && $cpw)
{
	if(strlen($pw) > 3)
	{
		if($cpw == $pw)
		{
			mysql_connect("localhost", "root", "") or die("We couldn't connect!");
			mysql_select_db("testsite");

			$username = mysql_query("SELECT name FROM users WHERE name='$name'");
			$count = mysql_num_rows($username);
			$remail = mysql_query("SELECT email FROM users WHERE email='$email'");
			$checkemail = mysql_num_rows($remail);

			if($checkemail)
			{
				echo "This email is already registered! Please type another email";
			}		
			elseif($count) 
			{
				echo "This name is already registered! Please type another name";
			}
			else
			{

			mysql_query("INSERT INTO users(name, email, password) VALUES('$name', '$email', '$pw')") or die(mysql_error());

			$registered = mysql_affected_rows();
	
			echo "You have successfully registered!";
			}
		}
		else
			echo "The password was not confirmed properly";
	}
	else
		echo "Your password is too short! You need a password with between 4 and 15 characters!";
}
else
{
	echo "You have to complete the form";
}

mysql_close();

?>

<center><h3><?php include("links.php"); ?></h3></center>
