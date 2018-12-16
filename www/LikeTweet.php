<?php

session_start();
include("connect.php");
$tweetid = $_GET['tweet_id'];
$InsertLike = "INSERT INTO likes(`tweet_id`,`user_id`,`date_created`)VALUES(" . $tweetid . "," . $_SESSION["SESS_MEMBER_ID"] . ", CURRENT_TIMESTAMP );";
mysqli_query($GLOBALS["con"], $InsertLike);
header('location:index.php?');
?>