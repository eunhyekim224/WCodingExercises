<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Mini Chat</title>
        <style>

        </style>
    </head>
    <body>
        <div id="wrapper">
            <form method="post" action="http://localhost:8080/sites/sql_practice/minichat/chat_post.php">
                <p>
                    <label for="pseudo">Login: </label>
                    <input type="text" name="pseudo">
                </p>
                <p>
                    <label for="message">Message: </label>
                    <input type="text" name="message">
                </p>     
                <input type="submit" value="send">
            </form>
            <div id="log">
                <?php
                        try {
                            $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',
                            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                        } catch(Exception $e) {
                            die('Error: '. $e->getMessage());
                        }
    
                        $convo = $db->query("SELECT * FROM minichat ORDER BY ID DESC LIMIT 0, 10");
                        while ($data = $convo->fetch()) {
                                echo '<li>'. $data['pseudo']. ': '. $data['message']. '</li>';
                                               
                        }         
                ?>
            </div>
        </div>
    </body>
</html>