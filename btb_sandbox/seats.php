<?php

$a = "Kevin";
$b = "Mary";
$c = "Joe";
$d = "Larry";
$e = "Audrey";

$students = array("a", "c","d");

foreach($students as $seat){
  echo  $$seat ."<br/>";
}



?>
