<?php

$url = "api.openweathermap.org/data/2.5/weather?q=Fredericton&units=metric&APPID=45bfb762ed60106a45fd68fdcc0848fa";

// initiate HTTP request
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($client);
curl_close($client);
echo $data . "<BR><BR>";

$myArray = json_decode($data, true); // true makes it an associative array
print_r($myArray); // print_r prints an array
echo '<BR><BR>';
echo $myArray['weather'][0]['main'];
echo '<BR>';
echo $myArray['main']['temp'];
echo '<BR>';
echo $myArray['wind']['speed'];
echo '<BR><BR>';
foreach ($myArray as $x)
    {
    echo print_r($x) . "<BR>";
    }
?>