<?php $title="My Blog" ?>
<?php ob_start(); ?>
<h1>My super blog !</h1>
<p><a href="index.php">Back to the ticket list</a></p>
<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']); ?>
        <em>le <?= $post['date_creation_fr']; ?></em>
    </h3>  
    <p>
    <?= nl2br(htmlspecialchars($post['content']));?>
    </p>
</div>
<h2>Comments</h2>
<?php require("comment_form.php"); ?>
<?php 
    if (isset($_REQUEST['status'])) {
        echo $_REQUEST['status'];
    }
?>
<?php
    while ($comment = $comments->fetch())
{
?>
<p><strong><?= htmlspecialchars($comment['autor']); ?></strong> le <?= $comment['date_comment_fr']; ?></p>
<p><?= nl2br(htmlspecialchars($comment['comment'])); ?></p>
<?php
} 
?>
<?php $content = ob_get_clean(); ?>
<?php require("./view/template.php"); ?>
 