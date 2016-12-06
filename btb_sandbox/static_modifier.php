<?php

class Student {
    //with static methods you can use this!
    static $total_students = 0; 
    
    static public function add_students(){
        self::$total_students++;
    }

    

    static function welcome_students($var="hello") {
        echo "{$var} students ";
        
}
}

echo Student::$total_students ."<br/>" ;
echo Student:: welcome_students() ."<br/>" ;
echo Student:: welcome_students("Greetings") ."<br/>" ;
Student::$total_students = 14;
echo Student::$total_students ."<br/>" ;
//make::an_error(); u skoglunda wyskakuje, coś po hebrajsku u mnie tylko, że nie można znaleźć klasy make. 
