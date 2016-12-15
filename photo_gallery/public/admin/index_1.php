<?php

require_once '../../includes/initialize.php';
//require_once '../../includes/user.php';
//require_once '../../includes/session.php';

if(!$session->is_logged_in()) {redirect_to("login.php");}

 ?>
<?php

$user = new User();
$user ->username = "Ryssssiu";
$user ->password = "niepodam";
$user -> first_name = "Rysiek";
$user -> last_name = "Marciniak";
//$user -> create();
print_r($user -> attributes());


/*
$user = User::find_by_id(3);
$user -> password = "cotamjaktam";
$user -> save();


$user = User::find_by_id(2);
//$user->delete();
echo $user->first_name;//nie działa jak u skoglunda
*/

?>