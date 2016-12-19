<?php

require_once '../../includes/initialize.php';
//require_once '../../includes/user.php';
//require_once '../../includes/session.php';

if(!$session->is_logged_in()) {redirect_to("login.php");}

$max_file_size = 1048576; //expressed in bytes
//$_SESSION["message"] ="";
//print_r($_SESSION);
//print_r($session);

if(isset($_POST["submit"])){
    $photo = new Photograph();
    $photo->caption = $_POST["caption"];
    $photo->attach_file($_FILES["file_upload"]);
    if($photo->save()){
        //Succes
        $session->message("Photograph uploaded succesfully");
        redirect_to("list_photos.php");
    }
 else {
        //failure
        $message = join("<br/>", $photo->errors);
    }
}






 ?>

<h2>Photo upload</h2>
<a href="../../includes/functions.php"></a>
<a href="../../includes/functions.php"></a>
<form action="photo_upload.php" enctype="multipart/form-data" method="post">
    <a href="../../includes/functions.php"></a>
    <input type="hidden" name="MAX_FILE_SIZE" value="<php echo $max_file_size; ?>"/>
    <p><input type="file" name="file_upload" /></p>
    <p>Caption: <input type="text" name="caption" value=""/></p>
    <input type="submit" name="submit" value="Upload"/>
    <?php echo output_message($message); ?>
    <a href="list_photos.php">Gallery</a>
    
</form>