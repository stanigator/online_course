<?php

class MyClass
{
	public $hello = "Hello World";

	public function result()
	{
		echo $this->hello."<br />";
	}

}

$objectMyClass = new MyClass();
$objectMyClass->result();

?>
