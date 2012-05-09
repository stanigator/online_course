<?php

class MyClass
{
	static function test()
	{
		echo "Victor";
	}
	
	static function result()
	{
		echo "My name is ".self::test();
	}
}

MyClass::result();

?>
