<?php

require_once '../../includes/database.php';
//require_once '../../includes/user.php';
require_once '../../includes/session.php';

if(!$session->is_logged_in()) {redirect_to("login.php");}

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
        <h2>Menu</h2>
    </div>
    
    <div id="footer">Copyright <?php echo date("Y", time());?>,Hemm</div>
</body>
</html>
