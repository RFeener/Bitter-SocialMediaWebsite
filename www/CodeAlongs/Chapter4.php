<?php
function PrintMessage(){
    echo "Hello World" . "<BR>";
}

function PrintMessage2($msg){
    echo $msg . "419" . "<BR>";
}
/*
function Calc($price, $tax=0.15){ //tax is defaulted to 0.15
    return $price * ($tax + 1);
}
*/

// & means byref AKA pointer to
function Calc(&$price, $tax=0.15){ //tax is defaulted to 0.15
    $price = $price * (1 + $tax);
}

//type-hinting
function DoStuff(Vehicle $myCar){
    //logic
}

function Factorial($n){
    if ($n ==1 ) return 1;
    
    return $n * Factorial($n-1);
}

$myNum = rand(1, 6); //random number from 1 to 6
echo $myNum . "<BR>";
echo getrandmax() . "<BR>";

PrintMessage();
PrintMessage2("Echo");
//echo Calc(100, 0.15) . "<BR>";
$price = 299.99;
echo Calc($price) . "<BR>";
echo $price . "<BR>";
?>