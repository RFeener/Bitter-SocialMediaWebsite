<?php

include("Includes/User.php");
//verify the user's login credentials. if they are valid redirect them to index.php/
//if they are invalid send them back to login.php
session_start();

// has the session been started before?
if (!isset($_SESSION['username']))
    {
    if (isset($_POST['username']))
        {
        //Takes input from Login Modal
        $username = $_POST['username'];
        $password = $_POST['password'];
        // Grab database Information based on username passed in
        $sql = "SELECT user_id,first_name,last_name,screen_name,password FROM users WHERE screen_name= '$username'";
        $res = mysqli_query($con, $sql);
        $rescheck = mysqli_num_rows($res);
        //Checks to see if a Users matches the SQL statement
        if ($rescheck < 1)
            {
            echo "<script>alert('No user found')</script>";
            header('location:login.php?dbcs=fl');
            }
        else // Username Matched
            {
            if ($row = mysqli_fetch_row($res)) // Grab Data from Row that matched
                {
                $h = password_verify($password, $row[4]);
                if ($h == false)
                    {
                    //Inside Here means the Password Didn't Verify
                    echo "<script>alert('Passwords Database Error')</script>";
                    header('location:login.php?dbcs=fl');
                    }
                else
                    {
                    //Happy Path currently a User with a Verified Password
                    $_SESSION["SESS_MEMBER_ID"] = $row[0];
                    $_SESSION["SESS_FIRST_NAME"] = $row[1];
                    $_SESSION["SESS_LAST_NAME"] = $row[2];
                    $_SESSION["screen_name"] = $row[3];


                    header('location:index.php?dbcs=logsuc');
                    }
                }
            }
        }
    }
else
    {
    echo "<script type='text/javascript'>alert('You are Already Logged in');</script>";
    }
?>