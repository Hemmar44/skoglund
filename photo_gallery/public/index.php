<?php

require_once '../includes/initialize.php';

//1. the current page number ($current_page)
$page = !empty($_GET["page"]) ? (int)$_GET["page"] : 1;

//2. records per page ($per_page)
$per_page = 3;

//3. total record count ($total_count)
$total_count = Photograph::count_all();

//find all photos
//use pagination instead
//$photos = Photograph::find_all();

$pagination = new Pagination($page, $per_page, $total_count);

$offset = $pagination->offset();
//instead of finding all records, just find the records for this page
$sql = "SELECT * FROM photographs LIMIT $per_page OFFSET $offset";
$photos = Photograph::find_by_sql($sql);

//Need to add ?page=$page to all links we want to
//maintain the current page (or store $page in $session);



 ?>

<?php foreach ($photos as $photo): ?>
<div style="float:left; margin-left: 20px;">
    <a href="photo.php?id=<?php echo $photo->id; ?>">
    <img src="<?php echo $photo->image_path(); ?>"width="200"/>
    </a>
    <p><?php echo $photo->caption; ?></p>
</div>
<?php endforeach; ?>
<div id="pagination" style="clear: both;">
    <?php 
    if($pagination->total_pages() > 1) {
        if($pagination->has_previous_page()){
            $previous=$pagination->previous_page();
            echo "<a href=\"index.php?page=$previous\">&laquo Previous &nbsp  </a>";
        }
        
        for($i=1; $i<=$pagination->total_pages(); $i++){
            if($i==$page){
                echo "<span style='font-weight:bold' class=\"selected\">$i</span>";
                
            }
            else{
            echo " <a href=\"index.php?page={$i}\">{$i} &nbsp</a>";
            }
        }
        
        if($pagination->has_next_page()){
            $next=$pagination->next_page();
            echo "<a href=\"index.php?page=$next\">Next &raquo;</a>";
        }
    }
    ?>
</div>

