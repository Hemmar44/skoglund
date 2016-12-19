<?php

require_once '../../includes/initialize.php';
//require_once '../../includes/user.php';
//require_once '../../includes/session.php';

if(!$session->is_logged_in()) {redirect_to("login.php");}

$photos = Photograph::find_all();
//print_r($photos);

//print_r($_SESSION);
//print_r($session);
?>
<body>
<h2>Photographs</h2>
<?php echo output_message($message); ?>
<table>
    <tr>
        <th>Image</th>
        <th>Filename</th>
        <th>Caption</th>
        <th>Size</th>
        <th>Type</th>
        <th>Comments</th>
        <th>&nbsp;</th>
 <?php foreach($photos as $photo){
    
 
     
     echo "<tr><td><img src='".$photo->admin_image_path()."' width='100' /></td>
       <td>{$photo->filename}</td>
       <td>{$photo->caption}</td>
       <td>{$photo->size_as_text()}</td>
       <td>{$photo->type}</td>
       <td><a href='comments.php?id={$photo->id}'>".count($photo->comments())."</a>
       <td><a href='delete_photo.php?id={$photo->id}'>Delete</a></td>
        
     </tr>";
          }
     ?>
       
</table>
    <a href="photo_upload.php">Upload a new photo</a>
</body>