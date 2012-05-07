<?php
	$date = date('F d, Y, g:i:s a');
	echo "Today is ".$date."<br />";


	if( isset($_SESSION['name']) || isset($_COOKIE['testsite']) )
	{
		if(!isset($_SESSION['name']) && isset($_COOKIE['testsite']))
		{
			$_SESSION['name'] =  $_COOKIE['testsite'];
		}
		$dir = "profiles/".$_SESSION['name']."/images/";
		/*$open = opendir($dir);

		while( ($file = readdir($open)) != FALSE)
		{
			if($file!="." && $file!=".." && $files!="Thumbs.db")
			{
				echo "img border='1' width='50' height='50' src='$dir/$file'>$_SESSION['name']</img>";
			}
		}*/	
		echo "&nbsp<b>".$_SESSION['name']."</b>'s session<br />";
		echo "<a href='logout.php'>Logout</a>";

		include('links.php');
	}
?>
