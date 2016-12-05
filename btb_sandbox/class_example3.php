<?php

class Person {
    
    function say_hello(){
        echo "hello from inside a Person class <br/>";
    }
}

$person = new Person();
$person2 = new Person();

echo get_class($person) ."<br/>";

if(is_a($person,"Person")){
    echo "Yup it's a Person <br/>";
}
else {
    echo "Oooops not a Person <br/>";
}

$person -> say_hello();
?>
