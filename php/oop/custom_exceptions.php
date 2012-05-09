<?php

$name = "Steven";
$email = "";


class NameException extends Exception{
	public function showNameError()
	{
		return "Error on Line ".$this->getLine()." in ".$this->getFile();
	}
}
class EmailException extends Exception{
	public function showEmailError()
	{
		return "Error on Line ".$this->getLine()." in ".$this->getFile();
	}
}
try
{
	if($name == "")
	{
		throw new NameException("No name");
	}
	elseif($email == "")
	{
		throw new EmailException("No email");
	}
	else
	{
		echo "Both name and email are valid!";
	}
}
catch(NameException $n)
{
	echo $n->ShowNameError();
}
catch(EmailException $n)
{
	echo $n->ShowEmailError();
}

?>
