<?php

require_once '../../includes/initialize.php';
//require_once '../../includes/user.php';
//require_once '../../includes/session.php';

if(!$session->is_logged_in()) {redirect_to("login.php");}

if(empty($_GET["id"])){
    $session->message("No photograph ID was provided.");
    redirect_to("index.php");
}

$photo = Photograph::find_by_id($_GET["id"]);
if(!$photo){
    $session->message("The photo could not be located.");
    redirect_to("index.php");
}

$comments = $photo->comments();
//print_r($comments);
?>

<h2>Comments on <?php echo $photo->filename;?></h2>
<?php echo output_message($message); ?>
<div id="comments">
    <?php foreach($comments as $comment):?>
    <div class="comment" style="margin-bottom: 2em;">
        <div class="author">
            <?php echo htmlentities($comment->author); ?> wrote:
       </div>
        <div class="body">
            <?php echo strip_tags($comment->body, "<strong><em><p>"); ?>
        </div>
        <div class="meta-info" style="font-size: 0.8em;">
            <a href="delete_comment.php?id=<?php echo $comment->id; ?>">Delete Comment </a>
        </div>
    </div>
    <?php    endforeach; ?>
    <?php if(empty($comments)) {echo "No Comments.";} ?>
</div>