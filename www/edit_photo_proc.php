<?php

include("connect.php");
session_start();
if (isset($_SESSION["SESS_MEMBER_ID"]))
    {
    $userid = $_SESSION["SESS_MEMBER_ID"];

//Check to see if file was uploaded
    if (empty($_FILES['pic']['name']))
        {
        header("Location:index.php?dbcs=picempty");
        }
    else
        {
        // 1 MB is the largest file size by default
        if ($_FILES['pic']['size'] > 1024 * 1024)
            {
            // header("Location:index.php?dbcs=oversize);
            unlink($_FILES['pic']['tmp_name']);
            }
        else
            {
            if (!move_uploaded_file($_FILES['pic']['tmp_name'], "Images/profilepics/" . $_FILES['pic']['name']))
                {
                header("Location:index.php?dbcs=pf");
                }
            else
                {
                //Happy Path///
                //Place Profile Pic URL inside user Database
                echo $_FILES['pic']['name'];
                $updateProfile = "update users set profile_pic = '" . $_FILES['pic']['name'] . "' where user_id = " . $userid;
                mysqli_query($con, $updateProfile);
                if (mysqli_affected_rows($con) > 0)
                    {
                    header("Location:index.php");
                    }
                else
                    {
                    header("Location:index.php?dbcs=pf");
                    }
                }
            }
        }
    }
?>

