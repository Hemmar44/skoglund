<?php

require_once '../includes/database.php';
require_once '../includes/user.php';

//just checking if db is working
//echo isset($database) ?  "works":  "nope";

//$sql = "INSERT INTO users (id, username, password, first_name, last_name) ";
//$sql.="VALUES (1, 'hemmar','niepodam','Marcin','Hedrzak')";

//$result = $database->query($sql);



$found_user = User::find_by_id(1);
echo $found_user["username"];

echo "<hr/>";

$user_set= User::find_all();
while($user = $database->fetch_array($user_set)){
    echo "User: ". $user["username"] ."<br/>
    Name: " .$user["first_name"] . " " . $user["last_name"]. "<br/><br/>";
}

 ?>
