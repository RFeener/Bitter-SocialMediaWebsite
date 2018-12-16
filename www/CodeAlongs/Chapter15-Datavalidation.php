<?php
//Encryption for Login PAge
$password = "password";
//$password = md5($password);
$password = password_hash($password, PASSWORD_DEFAULT);
$password2 = "password";
$password2 = password_hash($password2, PASSWORD_DEFAULT);

//echo $password . "<BR>";
//echo $password2 . "<BR>";
?>
<-- Uploading Photo-->
<form action="Chapter15 _proc.php" method="post" enctype="multipart/form-data">
    select your Profile Pic:
    <input type="file" name="pic" accept="image/*" required>
    <input id="button" type="submit" value="Submit">
</form>