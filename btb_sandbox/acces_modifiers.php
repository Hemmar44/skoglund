<?php

class Example {
    public $a = 1;
    private $b = 2;
    protected  $c = 3;
    
    function show_abc() {
        echo $this-> a;
        echo $this-> b;
        echo $this-> c;
    }
    
    public function HelloEveryone() {
        return "Hello Everyone!!! <br/>";
    }
    
    protected function HelloFamily() {
        return "Hello Family!!! <br/>";
    }
    
   private function HelloMe() {
        return "Hello Me!!! <br/>";
    }
    
    //public by default 
    function hello() {
        $output = $this->HelloEveryone();
        $output .= $this->HelloFamily();
        $output .= $this->HelloMe();
        return $output;
    }
}

class SmallExample extends Example {
    //private $b = 100;
    
        function show_abc() {
        echo $this-> a;
        echo $this-> b;
        echo $this-> c;
    }
}

$example = new Example();

echo "public a:". $example-> a ."<br/>";
//echo "private b:". $example-> b ."<br/>";
//echo "protected c:". $example-> c. "<br/>";
$example -> show_abc();
echo "<hr/>";
echo "hello everyone: {$example->HelloEveryone()} <br/>";
//echo "hello family: {$example->HelloFamily()} <br/>"; error
//echo "hello Me: {$example->HelloMe()} <br/>"; error
echo "hello : {$example->hello()} <br/>";


/*
$smallexample = new SmallExample();

echo "public small a:". $smallexample-> a ."<br/>";
//echo "private b:". $smallexample-> b ."<br/>";
//echo "protected c:". $smallexample-> c. "<br/>";
$smallexample -> show_abc();

//jeżeli nie skopiujemy ciała metody do dziecka, to będzie ona działała na zmiennych rodzica, nawet jeżeli w dziecku nadpiszemy ich wartość!!!!!
//żeby liczyła dla zmiennych z dziecka, trzeba przenieść całe ciało metody do dziecka, i dopiero wtedy niewidoczna będzie zmienna prywatna z rodzica. 
 * 
 */
?>
