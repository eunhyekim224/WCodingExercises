<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Mini Chat</title>
        <style>

            #wrapper {
                display: flex;
                flex-direction: column-reverse;
                align-items: center;
            } 

            #oldLog {
               margin: 11px;
            }

            #refresh{
                margin-top: 18px;
            }

            #wrapper form {
                display: inline-block;
            }

        </style>
    </head>
    <body>
        <div id="wrapper">
            <form method="post" action="http://localhost:8080/sites/sql_practice/minichat/chat_post.php">
                <p>
                    <label for="pseudo">Login: </label>
                    <input type="text" name="pseudo" value= 
                        <?php
                        if (isset($_COOKIE['pseudo'])) { 
                            echo $_COOKIE['pseudo'];
                        }
                        ?>
                    >
                </p>
                <p>
                    <label for="message">Message: </label>
                    <input type="text" name="message">
                </p>     
                <input type="submit" value="send">
            </form>
            <form method="post" action="http://localhost:8080/sites/sql_practice/minichat/chat.php" id="refresh">
                <input type="submit" value="refresh">
            </form>
            <div id="log">
                <?php
                        try {
                            $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',
                            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                        } catch(Exception $e) {
                            die('Error: '. $e->getMessage());
                        }

                        if (isset($_POST['currentMsgCount'])) {
                            $messagecount = $_POST['currentMsgCount'] + 10;
                        } else {
                            $messagecount = 10;
                        }

                        $totalMessages =  $db->query("SELECT COUNT(ID) as msg_count FROM minichat");
                        $totalMessagescount = $totalMessages->fetch()['msg_count'];

                        $startPosition = $totalMessagescount - $messagecount;

                        if ($startPosition > 0) {
                            $convo = $db->query("SELECT * FROM minichat ORDER BY ID LIMIT $startPosition, $messagecount");
                            while ($data = $convo->fetch()) {
                                    echo '<li>'. $data['pseudo']. ': '. $data['message']. '</li>';                                             
                            } 
                            $convo->closeCursor();
                        } else {
                            $convo = $db->query("SELECT * FROM minichat ORDER BY ID LIMIT 0, $messagecount");
                            while ($data = $convo->fetch()) {
                                    echo '<li>'. $data['pseudo']. ': '. $data['message']. '</li>';                                             
                            } 
                            $convo->closeCursor();          
                        }        
                ?>
            </div>
            <div id="oldLog"> 
                <form method="post" action="http://localhost:8080/sites/sql_practice/minichat/chat.php">      
                    <input type="submit" value="see old messages">
                    <input type="hidden" name='currentMsgCount' value= <?php echo $messagecount;?>>
                </form>
            </div>
        </div>
        <script>
        </script>
    </body>
</html>