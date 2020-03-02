<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>First Blog</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <div id="wrapper">
                <?php
                    try {
                        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '',
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                    } catch(Exception $e) {
                        die('Error: '. $e->getMessage());
                    }

                    showAllArticles($db);

                    function showAllArticles($db) {

                        $response = $db->query("SELECT *, DATE_FORMAT(date_creation,'%d/%m/%Y at %h\h%i\min%s\s') as date FROM articles ORDER BY date_creation DESC LIMIT 0, 5");
                        while ($data = $response->fetch()) {
                            echo '<div class="news"><h1>'.$data['title'].' '.$data['date'].'</h1>
                            <p>'
                            .$data['content']."</br><a href='comments.php?id_article=".$data['id']."'>Comments</a>
                            </p></div>";
                        }

                    }  

                ?>
        </div>

    </body>
</html>
