<?php

//Like fopen/fread/fclose
//opendir()
//readdir()
//closedir()

$dir = ".";

if(is_dir($dir)){
    if($dir_handle = opendir($dir)) {
        while($filename = readdir($dir_handle)){
            echo "filename: {$filename}<br/>";
        }
        //use rewindir($dir_handle) to start over;
        closedir($dir_handle);
    }
}

echo "<hr/>";
//scnandir(): readl all filenames into an array

if(is_dir($dir)){
    $dir_array = scandir($dir);
    //print_r($dir_array);
    foreach($dir_array as $file) {
        if(stripos($file,".")>0){
            echo "filename: {$file}<br/>";
        }
        //not much schorter, but maybe less complicated
        //make things like reverse order much easier.
                
                
                
                
                
                
                
                
                
                
                
    }
}

?>
