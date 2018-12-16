<?php

session_start();
if (isset($_SESSION["SESS_MEMBER_ID"]))
    {
    if (isset($_POST['reply']))
        {
        include('Tweet.php');
        include ("connect.php");

        $replyText = mysqli_real_escape_string($con, $_POST['reply']);
        $date_created = date("Y-m-d h:i:s");
        //Insert Statement
        $insertTweet = "INSERT INTO `tweets` (`tweet_text`, `user_id`, `original_tweet_id`, `reply_to_tweet_id`, `date_created`) "
                . "VALUES ('" . $_POST['reply'] . "'," . $_SESSION["SESS_MEMBER_ID"] . "," . $_POST['opID'] . "," . $_POST['hdnTweetid'] . ", '" . $date_created . "');";

        echo '<BR><BR>' . $insertTweet;
        mysqli_query($con, $insertTweet);
        echo '<BR><BR>' . mysqli_affected_rows($con);

        if (mysqli_affected_rows($con) == 1)
            {
            echo mysqli_affected_rows($con);
            header('location:index.php');
            }
        else
            {
            echo mysqli_affected_rows($con);
            header('location:index.php?dbcs=Failed reply');
            }
        }
    }
?>

