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
        $a = 1;
        $b = $a;
        $b=2;
        
        echo "a: ".$a. "b: ".$b." <br/>";
        
        $a = 1;
        $b =& $a;
        $b=2;
        
        echo "<p>Przez referencje</p>a: ".$a. "b: ".$b." <br/>";
        
        unset($b);
        
        echo "<p>Po unset b</p>a: ".$a. "b: ".$b." <br/>";
        
        ?>
    </body>
    
</html>
