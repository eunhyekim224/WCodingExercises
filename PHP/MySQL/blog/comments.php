<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>First Blog - Comments</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <div id="comments_wrapper">
            <a href="index.php">Back to the article list</a></br>
            <?php
                try {
                    $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '',
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                } catch(Exception $e) {
                    die('Error: '. $e->getMessage());
                }

                $id_article = isset($_GET['id_article']) ? $_GET['id_article'] : '';
                if ($id_article &&  $id_article > 0 &&  $id_article < 100) {
                    showArticle($id_article, $db);
                } else {
                    echo 'No comments available for this article!';
                }
                

                function showArticle($id, $db) {
                    $response = $db->query("SELECT *, DATE_FORMAT(date_creation,'%d/%m/%Y at %h\h%i\min%s\s') as date FROM articles WHERE id=$id");
                    $article = $response->fetch();
                    if (empty($article)) {
                        echo 'This article does not exist.';
                    } else {
                        include('display_article.php');
                        showComments($id, $db);
                        include('form_add_comment.php');
                        include('pages.php');
                    }    
                    $response->closeCursor();
                }

                function showComments($article, $db) {
                    $page = isset($_GET['page']) ? (int)$_GET['page']-1 : 0;
                    $limit_start = $page*5;
                    $response_comments = $db->prepare("SELECT *, DATE_FORMAT(date_creation,'%d/%m/%Y at %h\h%i\min%s\s') as date FROM comments WHERE id_article = :id_article ORDER BY date_creation DESC LIMIT $limit_start, 5");
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
        </div>
    </body>
</html>