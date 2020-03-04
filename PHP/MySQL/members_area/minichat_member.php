<?php
    session_start();

    if (isset($_SESSION['login']) AND isset($_SESSION['id'])) {
        echo 'Hello '.$_SESSION['login'].'!';
    } 
?>

<button><a href="logout.php">Logout</a></button>


