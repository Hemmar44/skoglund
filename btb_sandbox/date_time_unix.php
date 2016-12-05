<!DOCTYPE html>

<html>
    <head>
        <title>dates and times unix</title>
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        echo time();
        echo "<br/><br/>";
        echo mktime(9, 12, 5, 12, 12, 2017);
       echo "<br/><br/>";
       //checkdate
       echo checkdate(12,31,2000) ? "true" : "false";
       echo "<br/><br/>";
       echo checkdate(12,30,2016) ? "true" : "false";
       echo "<br/><br/>";
       
       $unix_timestamp = strtotime("now");
       echo $unix_timestamp;
        ?>
    </body>
</html>
