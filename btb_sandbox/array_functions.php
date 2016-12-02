<!DOCTYPE html>

<html>
    <head>
        <title>array functions
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        $numbers = array(1,2,3,4,5,6);
        print_r($numbers);
        echo "<br/><br/>";
        
        //removes first element and returns it
        $a = array_shift($numbers);
        
       print_r($numbers);
       echo "<br/><br/>";
        
       print "a: " .$a;
       
       //adds an element at the begining and returns count
       $b = array_unshift($numbers, "first");
       echo "<br/><br/>";
       print "b: " .$b;
       echo "<br/><br/>";
       print_r($numbers);
        
       //removes last element and returns it
       $a = array_pop($numbers);
       echo "<br/><br/>";
       print "a: " .$a;
       echo "<br/><br/>";
       print_r($numbers);
       
      //adds an element at the end and returns count
       $b = array_push($numbers, "last");
       echo "<br/><br/>";
       print "b: " .$b;
       echo "<br/><br/>";
       print_r($numbers);
        
        
        ?>
    </body>
</html>
