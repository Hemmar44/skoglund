<?php

$file = 'filetest.txt';
if($handle = fopen($file, 'w+')){ //overwite

    $content = "123\r\n456\r\n789"; //double quotes matters (with \r\n)
    fwrite($handle, $content);//returns number of bites or false
    fclose($handle);
}
else echo "Could not open file for writing";


//file_put_contents: shortcut for fopen/fwrite/fclose
//overwrites existing file by default

$file = "filetest.txt";
$content = "cos\r\ncos jeszcze\r\ni jeszcze coś";
if($size = file_put_contents($file, $content)){
    echo "A file of {$size} bytes was created";
}
?>
