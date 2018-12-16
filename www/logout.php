<?php

//log the user out and redirect them back to the login page.
//Start Session
session_start();
//Kills cookies
setcookie(session_name(), '', 100);
//Kills Session Variables
session_unset();
//Ends Session
session_destroy();
header('location:Login.php?dbcs=logoutsuccess');
?>
