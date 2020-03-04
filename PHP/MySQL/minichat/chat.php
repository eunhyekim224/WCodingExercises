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
                    include('display_old_msg.php');
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