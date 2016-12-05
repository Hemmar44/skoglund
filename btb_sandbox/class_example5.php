<?php

class Person {
    
    var $first_name;
    var $last_name;
    
    var $arm_count = 2;
    var $leg_count = 2;
    
    function say_hello(){
        echo "hello from inside a class " .get_class($this). "<br/>";
    }
    function full_name(){
        return $this->first_name." ".$this->last_name ."<br/>";
    }
    
}

$person = new Person();

//echo $person -> arm_count;
$person -> arm_count = 1;
$person -> first_name = "lucy" ;
$person -> last_name = "pakosinska";

$new_person = new Person();
$new_person -> first_name = "ethel" ;
$new_person -> last_name = "johnson";

echo $person -> full_name();
echo $new_person ->full_name();
         
$vars = get_class_vars("Person");
foreach ($vars as $var => $value) {
    echo "$var: $value <br/>";
}

echo property_exists("Person", "first_name") ? "true" : "false";


?>
