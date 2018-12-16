<?php

$url = "http://localhost/CodeAlongs/Chapter20-PHP_Services.php";
$format = "json";

$url = $url . "?format=" . $format . "&temp=37";
$cobj = curl_init();

curl_setopt($cobj, CURLOPT_URL, $url); // CURL is a versitile set of librairies tat allows php to send and recieve data via HTTPS
curl_setopt($cobj, CURLOPT_RETURNTRANSFER, 1); // IMPOORTANT FOR RETURNING

$data = curl_exec($cobj);
curl_close($cobj); // Don't forget to close

if ($format == "json")
    {
    $object = json_decode($data);
    echo $object->temp . "<BR>";
    }
else
    {
    $xmlObj = simplexml_load_string($data);
    echo $xmlObj->temp;
    }
?>

