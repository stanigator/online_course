<?php

/**
Validate an email address.
Provide email address (raw input)
Returns true if the email address has the email 
address format and the domain exists.
*/
function validEmail($email)
{
   $isValid = true;
   $atIndex = strrpos($email, "@");
   if (is_bool($atIndex) && !$atIndex)
   {
      $isValid = false;
   }
   else
   {
      $domain = substr($email, $atIndex+1);
      $local = substr($email, 0, $atIndex);
      $localLen = strlen($local);
      $domainLen = strlen($domain);
      if ($localLen < 1 || $localLen > 64)
      {
         // local part length exceeded
         $isValid = false;
      }
      else if ($domainLen < 1 || $domainLen > 255)
      {
         // domain part length exceeded
         $isValid = false;
      }
      else if ($local[0] == '.' || $local[$localLen-1] == '.')
      {
         // local part starts or ends with '.'
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $local))
      {
         // local part has two consecutive dots
         $isValid = false;
      }
      else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
      {
         // character not valid in domain part
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $domain))
      {
         // domain part has two consecutive dots
         $isValid = false;
      }
      else if(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',
                 str_replace("\\\\","",$local)))
      {
         // character not valid in local part unless 
         // local part is quoted
         if (!preg_match('/^"(\\\\"|[^"])+"$/',
             str_replace("\\\\","",$local)))
         {
            $isValid = false;
         }
      }
      if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
      {
         // domain not found in DNS
         $isValid = false;
      }
   }
   return $isValid;
}

/*$mypic = $_FILES['upload']['name'];
$temp = $_FILES['upload']['tmp_name'];

$upload_error[0] = "AOK";
$upload_error[1] = "Server says: File too big!";
$upload_error[2] = "Browser says: File too big!";
$upload_error[3] = "File upload didn't finish.";
$upload_error[4] = "Ummm.... You forgot the file.";
$upload_error[6] = "Oops.  Webmaster needs to fix something.";
$upload_error[7] = "Server says: I'm stuffed. Email webmaster.";
$upload_error[8] = "Server says: Not gonna do it.  Webmaster needs to fix something.";*/
// Added for debugging file size problem in Linux
/*if($_FILES['upload']['error'] == 0) {
   $type = $_FILES['upload']['type'];
} else {
    $error_num = $_FILES['upload']['error'];
    echo $upload_error[$error_num];
    die("About to exit process!");
}*/

$name = mysql_real_escape_string($_POST["name"]);
$email = mysql_real_escape_string($_POST["email"]);
$pw = mysql_real_escape_string($_POST["password"]);
$cpw = mysql_real_escape_string($_POST["cpassword"]);

if ($name && $email && $pw && $cpw)
{
	if(validEmail($email))
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
					$pwmd5 = md5($pw);
					mysql_query("INSERT INTO users(name, email, password) VALUES('$name', '$email', '$pwmd5')") or die(mysql_error());

					$registered = mysql_affected_rows();
	
					echo "You have successfully registered!<a href='home.php'>Login</a>";
					/*if(($type=="image/jpeg") || ($type=="image/jpg") || ($type=="image/bmp"))
					{
						$directory = "./profiles/$name/images";
						mkdir($directory, 0777);
						move_uploaded_file($temp, "$directory/$mypic");
						echo "What a pretty face!<p><img border='1' width='70' height='70' src='$directory/$mypic' /><p>";
						$pwmd5 = md5($pw);
						mysql_query("INSERT INTO users(name, email, password) VALUES('$name', '$email', '$pwmd5')") or die(mysql_error());

						$registered = mysql_affected_rows();
	
						echo "You have successfully registered!<a href='home.php'>Login</a>";
					}
					else
					{
						echo "This file has to be a jpeg, jpg, or bmp!";
						echo $type."<br />";
					}*/
				}
			}
			else
				echo "The password was not confirmed properly";
		}
		else
			echo "Your password is too short! You need a password with between 4 and 15 characters!";
	}
	else
		echo "Your email address is invalid! Please enter a valid email address!";
}
else
{
	echo "You have to complete the form";
}

mysql_close();

?>
