<form method="post" action="comment_post.php">
    <input type="hidden" name="id_article" value="<?php echo $id; ?>"/>
    <p>
        <label for="name">Name: </label>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="comment">Comment: </label>
        <input type="text" name="comment" id="comment">
    </p>
    <p>
        <input type="submit" value="Submit" id="submit">
    </p>
</form>