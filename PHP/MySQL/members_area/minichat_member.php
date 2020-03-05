<?php
    session_start();
    if (isset($_SESSION['login']) AND isset($_SESSION['id'])) {
        echo 'Hello '.$_SESSION['login'].'!';
    } else if (isset($_COOKIE['member_login'])) {
        echo 'Hello '.$_COOKIE['member_login'];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Minichat</title>
        <style>
            a {
                text-decoration: none;
                color: black;
            }

            a:visited {
                color: black;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <div id="buttons">
                <button><a href="logout.php">Logout</a></button></br>
                <button><a href="index.php">Register a new account</a></button>
            </div>
            <div id="chat">
                <?php include('minichat_james.php')?>
            </div>
        </div> 
    </body>
</html>


