<?php $title="My Blog" ?>
<?php ob_start(); ?>
<h1>My super blog !</h1>
<p>last articles of the blog :</p>
<?php
    while ($data = $articles->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']);?>
            <em>le <?= $data['date_creation_fr']; ?></em>
        </h3>

        <p>
        <?= nl2br(htmlspecialchars($data['content']));?>
        <br/>
        <em><a href="index.php?action=post&article=<?= $data['id']; ?>">Comments</a></em>
        </p>
    </div>
<?php
} 
$articles->closeCursor();
?>
<?php $content = ob_get_clean(); ?>
<?php require("template.php"); ?>