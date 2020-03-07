<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
        die('Error: '. $e->getMessage());
    }

    if (!isset($_GET['id_article'])) {
        makePagesArticles($db);
    } else {
        makePagesComments($db);
    }

    function makePagesArticles($db) {
        $totalArticles =  $db->query("SELECT COUNT(*) as nb_articles FROM articles");
        $totalArticlesCount = $totalArticles->fetch()['nb_articles'];
    
        $nb_pages_articles = ceil($totalArticlesCount/5);
        
        if ($nb_pages_articles > 0) {
            echo '<span>Page : </span>';
            for ($i=1; $i<=$nb_pages_articles; $i++) {
                echo "<a href=index.php?page=$i>"."$i"."</a>".' ';
            }
        }   
    }

    function makePagesComments($db) {
        $id_article = $_GET['id_article'];
        $totalComments =  $db->query("SELECT COUNT(*) as nb_comments FROM comments WHERE id_article=$id_article");
        $totalCommentsCount = $totalComments->fetch()['nb_comments'];
        
        $nb_pages_comments = ceil($totalCommentsCount/5);
    
        if ($nb_pages_comments > 0) {
            echo '<span>Page : </span>';
            for ($i=1; $i<=$nb_pages_comments; $i++) {         
                echo "<a href=comments.php?id_article=$id_article&page=$i>"."$i"."</a>".' ';
            } 
        }    
    }

?>
