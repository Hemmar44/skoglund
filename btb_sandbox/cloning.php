<?php

class Beverage {
    public $name;

    function __construct(){
    echo "New beverage was created. <br/>";
}

function __clone(){
    echo "A beverage was cloned. <br/>";
}
    
}



$a = new Beverage();
$a -> name = "coffe";

$b = $a; //always a reference with objects

$b -> name = "tea";

echo $a -> name;
echo "<br/>";

$c = clone $a;

$c -> name ="beer";

echo $a -> name;
echo "<br/>";
echo $c -> name;
 ?>
