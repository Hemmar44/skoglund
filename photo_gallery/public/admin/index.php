<?php

require_once '../../includes/initialize.php';
//require_once '../../includes/user.php';
//require_once '../../includes/session.php';

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
        <ul>
            <li><a href="logfile.php">check logs</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
    </div>
    
    <div id="footer">Copyright <?php echo date("Y", time());?>,Hemm</div>
</body>
</html>
