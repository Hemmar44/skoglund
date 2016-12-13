<?php

require_once ("../../includes/initialize.php");
//require_once '../../includes/user.php';
//require_once '../../includes/functions.php';
//require_once '../../includes/session.php';


if($session->is_logged_in()) {redirect_to("index.php");}
$message="";
if(isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    //check database to see if username/password exist.
    
    $found_user = User::authenticate($username, $password);
    
    if($found_user){
        $session->login($found_user);
        log_action("Login", "{$found_user->username} logged in.");
        redirect_to("index.php");
    }
    else{
        //username/password combo was not found in the database
        $message = "Username/password combination incorect";
    }
}
else{
    $username="";
    $password="";
            
}



 ?>
<html>
    
    <head>
        <title>Photo Gallery</title>
        <link href="../stylesheets/main.css" rel="stylesheet"/>
        
    </head>

<body>
    <div id="header">
        <h1>Photo Gallery</h1>
    </div>
    <div id="main">
        <h2>Staff Login</h2>
        <?php echo output_message($message);//nie kumam trzemu jest błąd?>
    </div>
    <form action="login.php" method="post">
        <table>
            <tr>
                <td>Username:</td>
                <td>
                    <input type="text" name="username" maxlength="30" value="<?php echo htmlentities($username); ?>"/>
                </td>
            </tr>
            <tr>
                <td>Password: </td>
                <td>
                    <input type="password" name="password" maxlength="30" value="<?php echo htmlentities($username); ?>"
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Login"/>
                </td>
            </tr> 
        </table>
    </form>
    
    <div id="footer">Copyright <?php echo date("Y", time());?>,Hemm</div>
</body>
</html>
<?php if(isset($database)){$database->close_connection();} ?>