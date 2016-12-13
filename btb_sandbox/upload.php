<?php
if(isset($_FILES["file_upload"])){
//In application, this could be moved to a config file
/*
$upload_errors = array(
    "UPLOAD_ERROR_OK" =>"No errors.",
    "UPLOAD_ERR_INI_SIZE" => "Larger than upload_max_filesize.",
    "UPLOAD_ERR_FORM_SIZE" =>"Larger than form MAX_FILE_SIZE.",
    "UPLOAD_ERR_PARTIAL" => "Partial upload.",
    "UPLOAD_ERR_NO_FILE" => "No file.",
    "UPLOAD_ERR_NO_TMP_DIR" => "No temporary directory",
    "UPLOAD_ERR_CANT_WRITE" => "Can't write to disk.",
    "UPLOAD_ERR_EXTENSION" => "File uploaad stopped by extension."
);
*/
    
$upload_errors = array(
    0 =>"No errors.",
    1 => "Larger than upload_max_filesize.",
    2 =>"Larger than form MAX_FILE_SIZE.",
    3 => "Partial upload.",
    4 => "No file.",
    6 => "No temporary directory",
    7 => "Can't write to disk.",
    8 => "File upload stopped by extension."
);
    
//process the form data 
$tmp_file = $_FILES["file_upload"]["tmp_name"];
$target_file = basename($_FILES["file_upload"]["name"]);//base name leaves onluy name.ext and puryfy that name
$upload_dir = "uploads";

//should be a test to check if file of that name already exists.

//returns false if $tmp_file is not a valid upload file or
//if it cannot be moved by any reason,
//can be move to another direction.

if(move_uploaded_file($tmp_file,$upload_dir."/".$target_file)){
    $message = "File uploaded succesfully.";
}
else{
$error = $_FILES["file_upload"]["error"];
$message =$upload_errors[$error];
}

}


?>
<html>
    
    <head>
        <title>uploads</title>
        
        
    </head>

<body>
    
    <form action="upload.php" method="POST" enctype="multipart/form-data">
       <!--the maximum file size in bytes must be used before thr input
       with file, can be manipulates but it's a good practice to use it anyway.
       It's a polite declaration for php.-->
       
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
        <input type="file" name="file_upload" />
        
        <input type="submit" name="submit" value="Upload"/>
    </form>
    <?php if(isset($message)){echo "<p>{$message}</p>";} ?>
</body>
</html>
