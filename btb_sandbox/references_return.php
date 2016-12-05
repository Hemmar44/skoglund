<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>References</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        //$var i $ a wskazują na to samo miejsce w pamięci dlatego $a się zmienia. 
        function &ref_return() {
            global $a;
            $a *= $a;
            return $a;
        }
        
        $a = 10;
        $b =& ref_return();
        
        echo "a = $a, b = $b <br/>";
        
        $b = 30;
        
        echo "a = $a, b = $b <hr/>";
                
        function &increment(){
            static $var = 0;
            $var++;
            return $var;
        }
        //jeżeli użyjemy referencji to możemy zwiększać a na dwa sposoby;
        $a =& increment(); 
        increment();
        $a++;
        increment();
        echo $a;
        
        
        ?>
    </body>
    
</html>
