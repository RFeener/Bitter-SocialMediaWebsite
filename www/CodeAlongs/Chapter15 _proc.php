<?php

//Check to see if file was uploaded
if (empty($_FILES['pic']['name']))
    {
    echo "Error: File not submitted";
    }
else
    {
    // 1 MB is the largest file size by default
    if ($_FILES['pic']['size'] > 1024 * 1024)
        {
        echo "Error: File must be under 1MB";
        unlink($_FILES['pic']['tmp_name']);
        }
    else
        {
        echo $_FILES['pic']['tmp_name'];
        if (!move_uploaded_file($_FILES['pic']['tmp_name'], "CodealongImages/" . $_FILES['pic']['name']))
            {
            echo "Error: Handling uploaded pic";
            }
        else
            {
            echo "All good";
            }
        }
    }
?>

