<?php

class Test
{

	function __construct($x, $y)
	{
		echo "Hello $x and $y";
	}

	function __destruct()
	{
		echo "Destruct!";
	}
}

$c = new Test("Ann", "George");
unset($c);
?>
