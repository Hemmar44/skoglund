<?php
//ten plik
echo __FILE__ ."<br/>";
//linia, na której jesteśmy uwaga na includes i require
echo __LINE__."<br/>";
//od php 5.3 pokazuje folder, w którym jesteśmy
echo __DIR__."<br/>";

echo file_exists(__FILE__) ? "yes" : "no";
echo "<br/>";

echo file_exists(__DIR__."/basic.htm") ? "yes" : "no";//no
echo "<br/>";
echo file_exists(__DIR__."/file_basics.php") ? "yes" : "no";//yes
echo "<br/>";
echo file_exists(__DIR__) ? "yes" : "no";//yes
echo "<hr/>";
echo is_file(__DIR__."/file_basics.php") ? "yup" : "ney" ;//yup
echo "<br/>";
echo is_file(__DIR__) ? "yup" : "ney" ; //ney
echo "<hr/>";
echo is_dir(__DIR__."/file_basics.php") ? "yup" : "ney" ;//ney
echo "<br/>";
echo is_dir(__DIR__) ? "yup" : "ney" ; //yup
echo "<br/>";
echo is_dir("..") ? "yup" : "ney" ; //yup
?>