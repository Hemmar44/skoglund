<?php

require_once '../../includes/initialize.php';
//require_once '../../includes/user.php';
//require_once '../../includes/session.php';

if(!$session->is_logged_in()) {redirect_to("login.php");}

$max_file_size = 1048576; //expressed in bytes

$message="";
if(isset($_POST["submit"])){
    $photo = new Photograph();
    $photo->caption = $_POST["caption"];
    $photo->attach_file($_FILES["file_upload"]);
    if($photo->save()){
        //Succes
        $message = "Photograph uploaded succesfully";
    }
 else {
        //failure
        $message = join("<br/>", $photo->errors);
    }
}






 ?>

<h2>Photo upload</h2>

<form action="photo_upload.php" enctype="multipart/form-data" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="<php echo $max_file_size; ?>"/>
    <p><input type="file" name="file_upload" /></p>
    <p>Caption: <input type="text" name="caption" value=""/></p>
    <input type="submit" name="submit" value="Upload"/>
    <p><?php echo $message ?></p>
    
</form>