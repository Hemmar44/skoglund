<?php

require_once '../includes/initialize.php';

//find all photos
$photos = Photograph::find_all();

 ?>

<?php foreach ($photos as $photo): ?>
<div style="float:left; margin-left: 20px;">
    <a href="photo.php?id=<?php echo $photo->id; ?>">
    <img src="<?php echo $photo->image_path(); ?>"width="200"/>
    </a>
    <p><?php echo $photo->caption; ?></p>
</div>
<?php endforeach; ?>


