<?php

//insert a tweet into the database
include ("connect.php");
session_start();
if (isset($_SESSION["SESS_MEMBER_ID"]))
    {
    if (isset($_POST['myTweet']))
        {
        $TweetOP = $_SESSION["SESS_MEMBER_ID"];
        $TweetText = mysqli_real_escape_string($con, $_POST['myTweet']);

        if ($TweetText != "")
            {
            ///Insert Statement
            $insertTweet = "INSERT INTO `tweets` (`tweet_text`, `user_id`, `original_tweet_id`, `reply_to_tweet_id`, `date_created`) "
                    . "VALUES ('" . $TweetText . "', '" . $TweetOP . "', '0', '0', CURRENT_TIMESTAMP);";
            mysqli_query($con, $insertTweet);
            $tweetqrycheck = mysqli_affected_rows($con);
            if ($tweetqrycheck == 1)
                {
                header('location:index.php');
                }
            else
                {
                header('location:index.php?dbcs=FailedTweet');
                }
            }
        else
            {
            header('location:index.php?dbcs=emptyTweet');
            }
        }
    }
?>