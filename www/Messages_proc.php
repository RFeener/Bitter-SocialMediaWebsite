<?php

session_start();
include("Includes/User.php");
if (isset($_SESSION["SESS_MEMBER_ID"]))
    {
    $toID = User::getIdbyScreenname($_POST["to"]);
    User::SendMessage($toID, $_POST["reply"]);
    }
?>
