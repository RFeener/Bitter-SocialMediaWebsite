<?php
    //array
    $colours[] = "Red";
    $colours[] = "Blue";
    $colours[] = "Yellow";

    echo $colours[0] . "<br>";
    echo $colours[1] . "<br>";
    echo $colours[2] . "<br>";
    
    //quicker way
    $colours1 = array (0=>"Red", 1=> "Blue", 2=> "Yellow");
    $colours2 = array ("Red", "Blue", "Yellow");
    
    //associative array
    $colours3 = array ("R"=> "Red", "B"=> "Blue", "Y"=> "Yellow");
    
    // 2 dimensional arrays
    $grades = array ("Jimmy" => array("math"=>90, "French"=>58), "Johnny" => array("math"=>88, "French"=>60), "Suzie" => array("math"=>75, "French"=>90));
    
    echo $grades["Jimmy"]["French"] . "<br>";
    
    //r stands for read mode
    $studentFile = fopen("students.txt", "r");
    
    while ($line = fgets($studentFile)){
        list($name, $homeTown, $GPA) = explode("|", $line);
        echo $name . " " . $homeTown . " " . $GPA . "<br>";
    }
    fclose($studentFile);
    
    //populate with a range of data
    $grades = range("A", "F");
    
    foreach ($grades as $grade){
        if ($grade == "E"){
            continue;
        }
        echo $grade . "<br>";
    }
    //print array for testing
    print_r($grades);
    //add to array
    array_unshift($colours, "purple");
    //add to end of array
    array_push($colours, "black");
    //
    array_shift($colours);
    //
    array_pop($colours);
    //
    if (in_array("Red", $colours3)){
        echo "FOUND <br>";
    }
    else{
        echo "nope <br>";
    }
    
    //
    echo sizeof($colours3) . " elemenets in array <br>";
    echo count($colours3) . " elemenets in array <br>";
    
    sort($colours1, SORT_STRING);
    natcasesort($colours);
    
    //merge an array
    $colours4 = array (0=>"White", 1=>"black");
    $newArray = array_merge($grade, $colours);
    
?>
