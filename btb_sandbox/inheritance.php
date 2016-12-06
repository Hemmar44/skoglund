<?php

class Car {
    var $wheels = 4;
    var $doors = 4;
    
    function wheeldoors() {
        return $this -> wheels + $this->doors;
    }
   
}

class CompactCar extends Car {
    var $doors = 2;

    function wheeldoors() {
        return $this -> wheels + $this->doors + 100;
    }
    
}

//useful functions
//get_parent_class("child"); returns nothing if doesn't have a parent or parent name if it does...
//is_subclass_of("child", "parent"); returns bool

 

$car1 = new Car();
$car2 = new CompactCar(); 

echo $car1 -> wheels ."<br/>";
echo $car1 -> doors. "<br/>";
echo $car1 -> wheeldoors(). "<br/>";

echo "<hr/>";

echo $car2 -> wheels ."<br/>";
echo $car2 -> doors. "<br/>";
echo $car2 -> wheeldoors(). "<br/>";

?>
