<?php
    function getPosts() {
        $db = dbConnect();
        $articles = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM articles ORDER BY creation_date DESC LIMIT 0, 5');
        return $articles;
    }

    function getPost($postId) {
        $db = dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM articles WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;

    }

    function getComments($postId) {
        $db = dbConnect();
        $comments = $db->prepare('SELECT autor, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments WHERE id_articles = ? ORDER BY date_comment');
        $comments->execute(array($postId));
        return $comments;
    }

    function addComment($postId, $commentName, $comment) {
        $db = dbConnect();          
        $addComments = $db->prepare("INSERT INTO comments(id_articles, autor, comment, date_comment) VALUES(:id_article, :author, :comment, NOW())");
        $status = $addComments->execute(array(
            'id_article' => $postId,
            'author' => htmlspecialchars($commentName),
            'comment' =>  htmlspecialchars($comment)
        ));
        return ($status) ? "success" : "fail";
    } 

    function dbConnect() {
        try
        {
            return new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Error : '.$e->getMessage());
        }
    }
