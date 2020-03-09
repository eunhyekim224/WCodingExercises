<form method="post" action="index.php">
    <input type="hidden" name="id_article" value="<?= $post['id']; ?>"/>
    <input type="hidden" name="action" value="postComment">
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