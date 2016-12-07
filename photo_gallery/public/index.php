<?php

require_once '../includes/database.php';
require_once '../includes/user.php';

//just checking if db is working
//echo isset($database) ?  "works":  "nope";

//$sql = "INSERT INTO users (id, username, password, first_name, last_name) ";
//$sql.="VALUES (1, 'hemmar','niepodam','Marcin','Hedrzak')";

//$result = $database->query($sql);



$record = User::find_by_id(1);
$user = new User();
echo $user->id = $record['id'];
echo "<br/>";
echo $user->username = $record["username"];
echo "<br/>";
echo $user->password = $record["password"];
echo "<br/>";
echo $user->first_name = $record["first_name"];
echo "<br/>";
echo $user->last_name = $record["last_name"];
echo "<br/>";
echo $user->full_name();




echo "<hr/>";

$user_set= User::find_all();
while($user = $database->fetch_array($user_set)){
    echo "User: ". $user["username"] ."<br/>
    Name: " .$user["first_name"] . " " . $user["last_name"]. "<br/><br/>";
}

 ?>
