<?php

// Temp Converter

$format = $_GET["format"]; // XML or JSON are the two types of returning data
if (isset($_GET["temp"]) && intval($_GET["temp"]))
    {
    $temp = $_GET["temp"];

    $returnval = ($temp * 1.8) + 32;

    if ($format == "json")
        {
        header("content-type: applcation/json");
        echo json_encode(array("temp" => $returnval));
        }
    else
        {
        header("content-type: applcation/xml");
        echo "<?xml version=\"1.0\" ?>";
        echo"<root>";
        echo"<temp>" . $returnval . "</temp>";
        echo"</root>";
        }
    }
?>
