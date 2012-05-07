<?php

$date = date('F d, Y, g:i:s a');
echo $date;

if(isset($_COOKIE['testsite']))
{
	header('Location:enter.php');
}
else
{
	echo '
	<html>

	<head>
	</head>

	<body>

	<h1><center>Welcome to CRUD control center</center></h1>

	<p>
	<center>Please login...</center>
	<center>
	<form method="post" action="login.php">

	Name: <input type="text" name="name" maxlength="15" /><br />
	Password: <input type="password" name="password" maxlength="15" /><br />
	Remember Me? <input type="checkbox" name="remember" /><br />

	<input type="submit" name="submit" value="Login" /><br />
	<p><a href="form.php">Register?</a>
	</center>

	</body>

	</html>';
}
?>
