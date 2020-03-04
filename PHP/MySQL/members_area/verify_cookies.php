<?php
    if (isset($_COOKIE['member_login']) AND isset($_COOKIE['member_pw'])) {
        verifyCookies();
    }

    function verifyCookies() {
        try {
            $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch(Exception $e) {
            die('Error: '. $e->getMessage());
        }

        $getDetails = $db->query("SELECT login, password FROM members_area");
        $member_details = $getDetails->fetchAll();

        foreach ($member_details as $key => $member) {

            if ($member['member_login'] === $_COOKIE['login'] AND password_verify($_COOKIE['member_pw'], $member['password'])) {
                header('Location: minichat_member.php');
            } 
        }
    }
?>