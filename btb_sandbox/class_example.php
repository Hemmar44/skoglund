<?php

class Person {
    
    
}

$classes = get_declared_classes();

foreach ($classes as $class){
    echo $class ."<br/>";
}

echo "<hr/>";

if(class_exists("Personw")) {
    echo "class has been defined";
}
else{
    echo "class doesn't exist";
}

?>
