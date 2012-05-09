<?php

$num = 20;
try
{
	if($num > 15)
	{
		echo "Number is than 15!";
	}
	else
	{
		throw new Exception("Number is less than 15");
	}
}
catch(Exception $er)
{
	echo "Error: ".$er->getMessage()."<br />";
}

?>
