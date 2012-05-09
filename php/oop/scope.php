<?php

class MyClass
{
	public $hello1 = "Hello World Public";
	protected $hello2 = "Hello World Protected";
	private $hello3 = "Hello World Private";

}

class MyClass2 extends MyClass
{
	public function result()
	{
		echo $this->hello3."<br />";
	}
}

$obj = new MyClass2();
$obj->result();

?>
