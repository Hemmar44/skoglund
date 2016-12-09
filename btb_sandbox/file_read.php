<?php

$file = 'filetest.txt';

if($handle = fopen($file, "r")){//read
   $content = fread($handle,9); //each character is 1 byte
   fclose($handle);
   
}

echo $content;
echo "<br/>";
echo nl2br($content);
echo "<hr>";

//to read the whole file we need to use filesize();
$file="filetest.txt";
if($handle = fopen($file, "r")){//read
   $content = fread($handle,filesize($file)); 
   fclose($handle);
}

echo $content;//without line breaks
echo "<br/>";
echo nl2br($content);//with line breaks
echo "<hr>";

//shortcut for fopem/fread/fclose
//companion to file put contents

$content = file_get_contents($file);
echo $content;//without line breaks
echo "<br/>";
echo nl2br($content);//with line breaks
echo "<hr>";

//incremental reading 
$file = "filetest";
if($handle = fopen($file, "r")){
    while(!feof($handle)){//while we are not at the end of file
        $content.=fgets($handle);
      }
      fclose($handle);
}

echo $content;//without line breaks
echo "<br/>";
echo nl2br($content);//with line breaks
echo "<hr>";

    
?>
