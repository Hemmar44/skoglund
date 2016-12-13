<?php

require_once '../../includes/initialize.php';
//require_once '../../includes/user.php';
//require_once '../../includes/session.php';

if(!$session->is_logged_in()) {redirect_to("login.php");}

 ?>
<?php

$user = new User();
$user ->username = "Agnieszka";
$user ->password = "niepodam";
$user -> first_name = "Aga";
$user -> last_name = "Hedrzak";
$user -> create();

/*
$user = User::find_by_id(2);
$user -> password = "costam";
$user -> save();


$user = User::find_by_id(2);
//$user->delete();
echo $user->first_name;//nie działa jak u skoglunda
*/

?>