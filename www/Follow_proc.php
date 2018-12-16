<?php
session_start();
include("connect.php");
//Create Variable to hold Follow User ID
$followuser = $_POST['action'];
//Insert Query
$followQ = "INSERT INTO `follows` (`from_id`, `to_id`) VALUES (" . $_SESSION["SESS_MEMBER_ID"] . "," . $followuser . ")";
mysqli_query($con, $followQ);
if (mysqli_affected_rows($con) == 1)
    {
    header('location:Index.php?dbcs=folsc');
    }
else
    {
    header('location:Index.php?dbcs=folfl');
    }
?>

`