<?php


//getcwd(): Current Working directory

echo getcwd()."<br/>";

//mkdir();

//mkdir("new",0777); //php default;
        
//recursive dir creation

mkdir("new/test/test2", 0777, true );

//changing directories

chdir("new");

echo getcwd() ."<br/>";

//removes last directory must be close.  
rmdir("test/test2");
        
?>
