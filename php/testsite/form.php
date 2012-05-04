<html>

<head>
<title>FORM</title>
</head>

<body>
<h2>Registration Form</h2>
<form method="post" action="insert.php">

Name: <input type="text" name="name" maxlength="15" /><br />
Email: <input type="text" name="email" maxlength="30" /><br />
Password: <input type="password" name="password" maxlength="15" /><br />
Confirm Password: <input type="password" name="cpassword" maxlength="15" /><br />

<input type="submit" name="submit" value="Register" />

<center><h3><?php include("links.php"); ?></h3></center>

</form>
</body>

</html>
