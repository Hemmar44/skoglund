<?php

class SetterGetterExample {
    
    private $a = 1; 
    
    public function get_a() {
        return $this-> a;
    }
    
    public function set_a($value) {
        $this-> a = $value;
        
    }
}

$example = new SetterGetterExample;

echo $example -> get_a();
echo "<br/>";
$example  -> set_a(15);
echo "<br/>";
echo $example -> get_a();


?>
