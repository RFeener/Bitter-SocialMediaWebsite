<?php

//////Date Function/////
function DateDisplay(DateTime $date)
    {
    $now = new DateTime();
    $interval = $date->diff($now);
    if ($interval->y > 1)
        {
        return $interval->format("%y years ago");
        }
    else if ($interval->y == 1)
        {
        return $interval->format("A year ago");
        }
    else if ($interval->m > 1)
        {
        return $interval->format("%m months ago");
        }
    else if ($interval->m == 1)
        {
        return $interval->format("A month ago");
        }
    else if ($interval->d > 1)
        {
        return $interval->format("%d days ago");
        }
    else if ($interval->d == 1)
        {
        return $interval->format("A day ago");
        }
    else if ($interval->i > 1)
        {
        return $interval->format("%i minutes ago");
        }
    else if ($interval->i == 1)
        {
        return $interval->format("A minute ago");
        }
    else if ($interval->s > 1)
        {
        return $interval->format("%i seconds ago");
        }
    else if ($interval->i == 1)
        {
        return $interval->format("A second ago");
        }
    }

function DisplayAlert($msg)
    {
    if ($msg == "sess")
        {
        echo "<script type='text/javascript'>alert('User was inserted into Database');</script>";
        }
    else if ($msg == "logsuc")
        {
        echo "<script type='text/javascript'>alert('Login Successful! Enjoy Trolling');</script>";
        }
    else if ($msg == "oversize")
        {
        echo "<script type='text/javascript'>alert('Picture is too Large');</script>";
        }
    else if ($msg == "picempty")
        {
        echo "<script type='text/javascript'>alert('Picture File Not Found');</script>";
        }
    else if ($msg == "folsc")
        {
        echo "<script type='text/javascript'>alert('Following User!');</script>";
        }
    else if ($msg == "folfl")
        {
        echo "<script type='text/javascript'>alert('Failed To Follow User');</script>";
        }
    else if ($msg == "pf")
        {
        echo "<script type='text/javascript'>alert('Error: File not submitted');</script>";
        }
    else if ($msg == "AccountCreated")
        {
        echo "<script type='text/javascript'>alert('Account Created! Try Logging In!');</script>";
        }
    else if ($msg == "fl")
        {
        echo "<script type='text/javascript'>alert('Login Failed, Check Username and Password');</script>";
        }
    else if ($msg == "relog")
        {
        echo "<script type='text/javascript'>alert('Session Timeout, Please Log In Again');</script>";
        }
    else if ($msg == "logoutsuccess")
        {
        echo "<script type='text/javascript'>alert('Log Out Successful');</script>";
        }
    else if ($msg == "retweeterror")
        {
        echo "<script type='text/javascript'>alert('Retweet Error');</script>";
        }
    else if ($msg == "emptyTweet")
        {
        echo "<script type='text/javascript'>alert('Tweet cannot be empty');</script>";
        }
    else if ($msg == "sameusererror")
        {
        echo "<script type='text/javascript'>alert('You Cannot Retweet Yourself');</script>";
        }
    else if ($msg == "FailedPostal")
        {
        echo "<script type='text/javascript'>alert('Incorrect Postal Code');</script>";
        }
    else
        {
        echo "<script type='text/javascript'>alert('Insert Error Detected');</script>";
        }
    }

?>
