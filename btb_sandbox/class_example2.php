<?php

class Person {
    
    function say_hello(){
        echo "hello from inside a Person class <br/>";
    }
}

$methods = get_class_methods("Person");

foreach($methods as $method){
    echo $method ."<br/>";
}

if(method_exists("Person","say_hello")){
    echo "method does exist";
}
else echo "method doesn't exist";

?>
