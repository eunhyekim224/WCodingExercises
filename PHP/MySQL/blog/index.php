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

                        $page = isset($_GET['page']) ? (int)$_GET['page']-1 : 0;
                        $limit_start = $page*5;
                        $response = $db->query("SELECT *, DATE_FORMAT(date_creation,'%d/%m/%Y at %h\h%i\min%s\s') as date FROM articles ORDER BY date_creation DESC LIMIT $limit_start, 5");
                        while ($article = $response->fetch()) {
                            include('display_article.php');
                        }
                    }  
                    include('pages.php');
                ?>
        </div>

    </body>
</html>
