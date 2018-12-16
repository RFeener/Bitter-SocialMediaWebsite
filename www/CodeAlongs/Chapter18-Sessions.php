<?php
// Chapter 18 Sessions
session_start();
// Similar to $_POST, $_SESSION is another way to control data
$_SESSION["username"] = "Jim";
echo $_SESSION["username"]."<BR>";

//Session Id keep track of the user
if(isset($_SESSION["username"]))
    {
    echo session_id()."<BR>"."<BR>";
    }
    echo session_encode()."<BR>";


session_unset();//Removes session variables
session_destroy();// Kills the session completly

?>

