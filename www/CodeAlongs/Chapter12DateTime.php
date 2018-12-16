<?php

//checkdate() checks to make sure input is a valid date
$valid = checkdate(10, 15, 2018);
if ($valid)
    {
    echo "Valid Date";
    }
else
    {
    echo 'Not valid';
    }

date_default_timezone_get("America/Halifax");
setlocale(LC_ALL, "en-CA");
//The letters signify what date increment you want
////date((h)our,m(i)nutes,(s)econds(a)m/pm
echo "The time is " . date("h:i:sa") . "<br>";
echo 'The Date is ' . date("F d, Y") . "<br>";
;
$dateArray = getDate();
print_r($dateArray);
echo strftime("%A %d %B, %Y");

echo '<br> Page Last Modified on ' . date("F d, Y h:i:sa", getlastmod()) . "<BR>";

///////////////////////////
// New Stuff in PHP 5.1 //
/////////////////////////

$dateTweeted = "2018-10-15"; // Change hard coded value into the database date
$tweettime = new DateTime($dateTweeted);
$now = new DateTime();
$interval = $tweettime->diff($now);
echo $interval->format("Number of days between tweet time and now = %d") . "<BR>";

if ($interval->y > 1)
    {
    echo $interval->format("%y years ago");
    }
else if ($interval->y == 1)
    {
    echo $interval->format("A year ago");
    }
else if ($interval->m > 1)
    {
    echo $interval->format("%m months ago");
    }
else if ($interval->m == 1)
    {
    echo $interval->format("A month ago");
    }
else if ($interval->d > 1)
    {
    echo $interval->format("%d days ago");
    }
else if ($interval->d == 1)
    {
    echo $interval->format("A day ago");
    }
else if ($interval->i > 1)
    {
    echo $interval->format("%i minutes ago");
    }
else if ($interval->i == 1)
    {
    echo $interval->format("A minute ago");
    }
else if ($interval->s > 1)
    {
    echo $interval->format("%i seconds ago");
    }
else if ($interval->i == 1)
    {
    echo $interval->format("A second ago");
    }
?>