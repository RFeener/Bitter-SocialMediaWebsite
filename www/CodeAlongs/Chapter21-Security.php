<?php

$message = " Hello World";
echo md5($message) . "<BR>";
$message = " Hello Ryan";
echo md5($message) . "<BR>";

//iv means initialization vector
$iv = mcrypt_create_iv(8, MCRYPT_RAND);
$key = "secret";

//Need 4 thins cypher,data,key,mode

$encMsg = mcrypt_encrypt(MCRYPT_BLOWFISH, $key, $message, MCRYPT_MODE_CBC, $iv); // CBC stands for cypher block chaining
echo $encMsg . "<BR>";
echo bin2hex($encMsg) . "<BR>";
echo mcrypt_decrypt(MCRYPT_BLOWFISH, $key, $encMsg, MCRYPT_MODE_CBC, $iv) . "<BR>";
?>

