<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>First Blog - Comments</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <div id="comments_wrapper">
            <?php
                try {
                    $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '',
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                } catch(Exception $e) {
                    die('Error: '. $e->getMessage());
                }

                showEachArticle($db);

                function showEachArticle($db) {
                    echo '<a href="index.php">Back to the article list</a></br>';
                    if (isset($_GET['id_article']) && $_GET['id_article'] > 0 && $_GET['id_article'] < 100) {
                        $id_article = $_GET['id_article'];
                        setcookie('id_article', $id_article);
                        showArticle($id_article, $db);
                        showComments($id_article, $db);
                    } else {
                        echo 'No comments available for this article!';
                    }
                }

                function showArticle($id, $db) {
                    $response = $db->query("SELECT *, DATE_FORMAT(date_creation,'%d/%m/%Y at %h\h%i\min%s\s') as date FROM articles WHERE id=$id");
                    while ($data = $response->fetch()) {
                        if (empty($data)) {
                            echo 'This article does not exist.';
                        } else {
                            echo '<div class="news"><h1>'.$data['title'].' '.$data['date'].'</h1>
                            <p>'
                            .$data['content'].
                            "</p></div>";
                        }    
                    }
                    $response->closeCursor();
                }

                function showComments($article, $db) {        
                    $response_comments = $db->prepare("SELECT *, DATE_FORMAT(date_creation,'%d/%m/%Y at %h\h%i\min%s\s') as date FROM comments WHERE id_article = :id_article ORDER BY date_creation LIMIT 0, 10");
                    $response_comments->execute(array(
                        'id_article' => htmlspecialchars($article)
                    ));
                    echo "<h3>Comments</h3>";
                    while ($data = $response_comments->fetch()) {      
                        echo "<div class='comments'><strong>".$data['author'].' </strong>'. $data['date']. '</br>'
                        .$data['comment'].'</div></br>';
                    }

                    $response_comments->closeCursor();
                }
            ?>
            <form method="post" action="comment_post.php">
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
        </div>
    </body>
</html>