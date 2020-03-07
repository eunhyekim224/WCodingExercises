<div class="news">
    <h1><?php echo $article['title'].' '.$article['date'];?></h1>
    <p><?php echo $article['content'];?>
    <?php
    if(!isset($_GET['id_article'])){
        echo "</br><a href='comments.php?id_article=".$article['id']."'>Comments</a>";
    }
    ?>
    </p>
</div>