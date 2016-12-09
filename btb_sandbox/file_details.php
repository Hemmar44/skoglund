<?php

$filename ="filetest.txt";

echo filesize($filename). "<br/>";// in bytes;

//filemtime: last modified (changed content)
//filectime: last changed (changed content or metadata works different on my version of php)
//fileatime: last accessed (any read/change)

echo strftime("%m/%d/%Y %H:%M", filemtime($filename))."<br/>";
echo strftime("%m/%d/%Y %H:%M", filectime($filename))."<br/>";
echo strftime("%m/%d/%Y %H:%M", fileatime($filename))."<br/>";   
echo "<hr/>";
//touch($filename);

//echo strftime("%m/%d/%Y %H:%M", filemtime($filename))."<br/>";
//echo strftime("%m/%d/%Y %H:%M", filectime($filename))."<br/>";
//echo strftime("%m/%d/%Y %H:%M", fileatime($filename))."<br/>"; 

$path_parts = pathinfo(__FILE__);
print_r($path_parts);
?>
