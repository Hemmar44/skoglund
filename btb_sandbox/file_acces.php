<?php

$file = 'filetest.txt';
if($handle = fopen($file, 'w+')){;
echo "ready steady";
fclose($handle);
}
else echo "Could not open file for writing";
?>
