<?php

$name = $_POST["phpname"];
$pw = $_POST["phppw"];

if($name && $pw)
{
    echo "You are logged in!";
}
else
{
    echo "You have to type a name and password!";
}

?>
