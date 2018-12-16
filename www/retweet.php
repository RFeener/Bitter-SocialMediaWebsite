<?php

session_start();
include('Includes/Tweet.php');
//Uses function to retrieve Tweet Object
$OGT = Tweet::getTweet($_GET["id"]);

//Make Sure you are not Retweeting Your own Tweet
//if ($_SESSION["SESS_MEMBER_ID"] != $OGT->getUserid())
//    {
//Take the $OGT object and insert it into database as a new tweet with a retweet id
$retweetSQL = "INSERT INTO `tweets` (`tweet_text`, `user_id`, `original_tweet_id`, `reply_to_tweet_id`, `date_created`) "
        . "VALUES ('" . $OGT->getTweetText() . "', '" . $_SESSION["SESS_MEMBER_ID"] . "', '" . $OGT->getUserid() . "', '0', CURRENT_TIMESTAMP);";

mysqli_query($GLOBALS['con'], $retweetSQL);
mysqli_affected_rows($con);

if (mysqli_affected_rows($con) == 1)
    {
    echo mysqli_affected_rows($con);
    header('Location:index.php');
    }
else
    {
    echo mysqli_affected_rows($con);
    header('Location:index.php?dbcs=retweeterror');
    }
?>

