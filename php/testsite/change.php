<?php

session_start();

if(isset($_POST['submit']))
{
	/*$mypic = $_FILES['newupload']['name'];
	$temp = $_FILES['newupload']['tmp_name'];
	$type = $_FILES['newupload']['type'];
	
	if(($type=="image/jpeg") || ($type=="image/jpg") || ($type=="image/bmp"))
	{*/
	
	$id = $_REQUEST['id'];
	$newname = $_REQUEST['newname'];
	$newemail = $_REQUEST['newemail'];
	$newpw = $_REQUEST['newpassword'];

	if( ($newname || $newemail) != "")
	{

		mysql_connect("localhost", "root", "") or die("We couldn't connect!");
		mysql_select_db("testsite");

		mysql_query("UPDATE users SET name='$newname', email='$newemail' WHERE id='$id'") or die(mysql_error());

		
	}
	else
		echo "You have to type a name and email";

	if($newpw != "")
	{
		$md5 = md5($newpw);
		mysql_query("UPDATE users SET password='$md5' WHERE id='$id'") or die(mysql_error());
	}

	/*if($_SESSION['name'] != $newname)
	{
		$dir = "profiles/".$_SESSION['name']."/images";
		$files = 0;
		$handle = opendir($dir);
		while( ($file = readdir($handle)) != FALSE)
		{
			if($file!="." && $file!=".." && $file!="Thumbs.db")
			{
				unlink($dir."/".$file);
				$files++;
			}

		}
		closedir($handle);
		sleep(1);
		rename("profiles/".$_SESSION['name']."", "profiles/$newname");		
	}
	move_uploaded_file($temp, "profiles/$newname/images/$mypic");*/

	echo "Your values have been updated successfully!";
	mysql_close();
	header("Refresh:2; url=logout.php");

	/*}
	else
		echo "Please load a valid jpeg, jpg, or bmp file!";*/

	include('links.php');
}
else
	echo "Access denied!";

?>
