<?php

$file = 'filetest.txt';
if($handle = fopen($file, 'w+')){ //overwite

    $content = "123\r\n456\r\n789"; //double quotes matters (with \r\n)
    fwrite($handle, $content);//returns number of bites or false
    
    $pos = ftell($handle);
    
    fseek($handle, $pos -6);
    fwrite($handle, "abcdef");
    
    rewind($handle);
    fwrite($handle, "xyz");
    
    fclose($handle);
}

//Bewarw it will Overtype!!!
//NOTE: a and a+ modes will not let you move the pointer

?>
