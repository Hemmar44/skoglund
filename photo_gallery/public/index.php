<?php

require_once '../includes/database.php';
require_once '../includes/user.php';

//just checking if db is working
//echo isset($database) ?  "works":  "nope";

//$sql = "INSERT INTO users (id, username, password, first_name, last_name) ";
//$sql.="VALUES (1, 'hemmar','niepodam','Marcin','Hedrzak')";

//$result = $database->query($sql);



$user = User::find_by_id(1);

echo $user -> full_name();


echo "<hr/>";

$users= User::find_all();


foreach ($users as $user) {
  echo "User: ". $user->username ."<br/>
  Name: ". $user->full_name(). "<br/><br/>";  
}

 ?>
