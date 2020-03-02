<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
        die('Error: '. $e->getMessage());
    }

    $id_article = $_COOKIE['id_article'];

    addComment($db, $id_article);


    function addComment($db, $id_article) {
            
        if (isset($_POST['name']) AND isset($_POST['comment']) AND $_POST['name'] !== '' AND $_POST['comment'] !== '') {
            $response = $db->prepare("INSERT INTO comments(id_article, author, comment, date_creation) VALUES(:id_article, :author, :comment, NOW())");
            $response->execute(array(
                'id_article' => $id_article,
                'author' => htmlspecialchars($_POST['name']),
                'comment' =>  htmlspecialchars($_POST['comment'])
            ));

            $response->closeCursor();
        }
            header('Location: comments.php?id_article='.$id_article);    
      
    } 
    
?>