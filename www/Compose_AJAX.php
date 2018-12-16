<?php

session_start();
include("Includes/User.php");
echo User::GetScreenNames($_GET["to"]);
?>