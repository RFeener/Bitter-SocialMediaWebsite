<?php

//If the name field is filled in
if (isset($_POST['name']))
    {
    $name = $_POST['name'];
    $email = $_POST['email'];
    echo "Hi " . $name . "! The address " . $email . " Will soon be sent thousands of spam";
    }
?>
