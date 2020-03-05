<?php
    session_start();
    session_destroy();

    setcookie('member_login', '');
    setcookie('member_pw', '');

    header('Location: connection_page.php');
?>

