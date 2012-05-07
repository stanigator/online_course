<html>

<head>
<title>FORM</title>
</head>

<body>
<h2>Registration Form</h2>
<form name="form" method="post" enctype="multipart/form-data" action="insert.php">

Name: <input type="text" name="name" maxlength="15" /><br />
Email: <input type="text" name="email" maxlength="30" /><br />
Password: <input type="password" name="password" maxlength="15" /><br />
Confirm Password: <input type="password" name="cpassword" maxlength="15" /><br />

<input type="hidden" name="MAX_FILE_SIZE" value="500000000">
Choose your picture: <input type="file" name="upload"><p>
<input type="submit" name="submit" value="Register" /><br />

<p>
<center><h3><?php include("links.php"); ?></h3></center>

</form>
</body>

</html>
