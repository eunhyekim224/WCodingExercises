<?php
    $inputPassword = $_POST['password'];
    $password = 'Kangaroo';

    if (isset($inputPassword) AND $inputPassword === $password) {
        include('secret.php');
    } else {
        echo "Incorrect password";
    }

?>