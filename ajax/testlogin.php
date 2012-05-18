<?php

$name = $_GET["name"];
$pw = $_GET["password"];

if($name && $pw)
{
    mysql_connect("localhost", "root", "") or die("Problem with connection");
    mysql_select_db("testlogin");

    $query = mysql_query("SELECT * FROM users WHERE username='".$name."'");
    $numrows = mysql_num_rows($query);

    if($numrows != 0)
    {
        while($row = mysql_fetch_assoc($query))
        {
            $dbname = $row["username"];
            $dbpw = $row["password"];
        }
        if($name == $dbname)
        {
            if($pw == $dbpw)
                echo "You are in!";
            else
                echo "Please correct your password";
        }
        else
            echo "Username not registered";
    }
}
else
{
    echo "You have to type a username and password!";
}

?>
