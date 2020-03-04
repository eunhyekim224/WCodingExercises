<?php
    session_start();

    if (isset($_SESSION['login']) AND isset($_SESSION['id'])) {
        echo 'Hello '.$_SESSION['login'].'!';
    } 
?>