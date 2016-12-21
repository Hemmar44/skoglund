<!DOCTYPE html>

<html>
    <head>
        <title>variable variables</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
       <?php
       
       $a = "hello";
       $hello = "hello everyone";
       echo $a."<br/>";
       echo $hello ."<br/>";
       
       echo $$a."<br/>";
       
       
       ?>
    </body>
</html>
