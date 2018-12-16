<?php

session_start();
include("connect.php");
$tweetid = $_GET['tweet_id'];
$DeleteLike = "delete from likes where tweet_id = $tweetid and user_id=" . $_SESSION["SESS_MEMBER_ID"] . ";";
mysqli_query($GLOBALS["con"], $DeleteLike);
header('location:index.php?');
?>