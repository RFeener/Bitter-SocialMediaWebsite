<?php

try
    {

    if (!mysqli_connect(host, user, pass, db, ))
        {
        error_log('Connection Failed', 333); // Error logs will pass error to the console instead of to the HTML page
        }
    }//end Try
catch (Exception $ex)
    {
    error_log("error in file" . $ex->getFile() . " on line #" . $ex->getLine() . " Details: " . $ex->getMessage());
    }
?>
