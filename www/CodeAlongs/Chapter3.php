<html>
    <body>

        <?php
        $name = "Jimmy";
        // use . for string concatination
        echo "value of name is " . $name . "<br>";

        echo "Hello $name <br>";

        $numCans = 6;
        $price = 15.99;

        echo $numCans . " of beer costs $" . $price . "<BR>";


        $student[0] = "Sarah";
        $student[1] = "John";
        $student[2] = "Suzie";

        $MyVar = "5";
        $MyVar2 = "20";
        $MyVar += $MyVar2;
        $MyVar++;
        echo gettype($MyVar) . "<BR>";
        echo "MyVar is: " . $MyVar . " and MyVar2 is: " . $MyVar2 . "<BR>";

        //CONSTANTS
        define("PI", 3.1415926);
        echo "value of PI is: " . PI . "<BR>";
        if ($MyVar === $MyVar2)
            {
            echo "EQUAL <BR>";
            }
        else
            {
            echo 'Not Equal';
            }
        $MyString = "the shirt cost $19.99" . "<BR>";
        echo $MyString;

        $i = 0;

        while ($i <= 10)
            {
            echo "The value of i is " . $i . "<BR>";
            $i++;
            }
        do
            {
            echo "Do whiles will fire atleast once <BR>";
            }
        while ($i < 1);


        for ($j = 0; $j < 5; $j++)
            {
            for ($k = 0; $k < 2; $k++)
                {
                echo "im inside the k for-loop! <BR>";
                }
            echo "im inside the J for-loop! <BR>";
            }
        ?>
    </body>

</html>
