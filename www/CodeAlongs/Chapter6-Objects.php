<?php

class Animal
    {

    const numLegs = 4;

    private $weight;
    private $species;
    private $color;

    static function MakeNoise()
        {
        echo "NEIGH <BR>";
        }

    //Abstract methods cannot be instantiated and do not have a body
    //Must be implmented in the child class
    //abstract function SomeMethod();

    function __construct($weight, $species, $color)
        {
        $this->weight = $weight;
        $this->species = $species;
        $this->color = $color;
        }

    //MAgic MEthod takes a variable you wish to get and set instead of
    function __get($name)
        {
        return $this->$name;
        }

    function __set($name, $value)
        {
        $this->$name = $value;
        }

    function __destruct()
        {
        echo 'This is called when the object gets removed from memory ';
        }

    }

$myAnimal = new Animal(150, "zebra", "Black");
echo $myAnimal->color . "<BR>" . $myAnimal->weight . "<BR>";
$myAnimal->weight = 252;
echo $myAnimal->weight . "<BR>";
echo $myAnimal->MakeNoise();
// Call a statically mathod properly
echo $myAnimal::MakeNoise() . "<BR>";

function PrintAnimal(Animal $animal)
    {
    echo"Printed Animal:  " . $animal->color . "  " . $animal->weight . "  " . $animal->species . "<BR><BR>";
    }

PrintAnimal($myAnimal);
?>
