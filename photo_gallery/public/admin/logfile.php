<?php 
require_once ("../../includes/initialize.php");
if(!$session->is_logged_in()){
    redirect_to("login.php");
}

$logfile = "../logs/logs.txt";

if(isset($_GET["clear"]) and $_GET["clear"]==="true"){
    file_put_contents($logfile, "");
    //Add the first log entry
    log_action("Logs Cleared","by User ID {$session->user_id}");
    //redirect to the same page so that the URL won.t have "clear=true anymore;
    redirect_to("logfile.php");
}


?>
    
<a href = "index.php"> Back </a><br/>
<br/>

<h2>Log file</h2>

<p><a href="logfile.php?clear=true">Clear log file</a></p>

<?php 

if(file_exists($logfile) && is_readable($logfile) && $handle=fopen($logfile, "r")){//read
    
    echo "<ul class = \"log-entries\">";
    while(!feof($handle)){
        $entry = fgets($handle);
        echo "<li>{$entry}</li>";
       
    }
    echo "</ul>";
    fclose($handle);
    
  }
  else {
      echo "Could not read from {$logfile}.";
  }

?>



