<?php

class Constants
{
	const RED = "#FF0000";
	const Hello = "Hello!";

	public function output()
	{
		echo self::RED;
		echo "<br />";
		echo self::Hello;
	}
}

echo Constants::Hello;

?>
