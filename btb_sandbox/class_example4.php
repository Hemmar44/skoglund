<?php

class Person {
    
    function say_hello(){
        echo "hello from inside a class " .get_class($this). "<br/>";
    }
    function hello(){
        $this->say_hello();
    }
}

$person = new Person();
echo $person -> say_hello();
echo $person -> hello();

?>
