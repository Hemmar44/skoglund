<!DOCTYPE html>

<html>
    <head>
        <title>server variables</title>
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        $var = 1;
        
        function test() {
            $var = 2;
            echo $var ."<br/>";
        }
        
        test();
        echo $var;
        
        echo "<hr/";
        
        $var = 1;
        
       function test2() {
       global $var;
       $var = 2;
       echo $var ."<br/>";
        }
        
        test2();
        echo $var;
        
        echo "<hr/";
        
       $var = 1;
                
        
       function test3() {
           //static means that it keeps value;
           static $var = 2;
       
       echo $var ."<br/>";
       $var++;
        }
        
        test3();
        test3();
        test3();
        echo $var;
        ?>
    </body>
</html>
