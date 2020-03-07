<?php
    if (isset($_COOKIE['member_login']) AND isset($_COOKIE['member_pw'])) {
        verifyCookies();
    }

    function verifyCookies() {
        try {
            $db = new PDO('mysql:host=localhost;dbname=james_minichat;charset=utf8', 'root', '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch(Exception $e) {
            die('Error: '. $e->getMessage());
        }

        $getDetails = $db->query("SELECT login, password FROM members_area");
        $member_details = $getDetails->fetchAll();

        foreach ($member_details as $key => $member) {
            
            if ($member['login'] === $_COOKIE['member_login'] AND $_COOKIE['member_pw'] = $member['password']) {
                echo $member['login'];
                header('Location: minichat_member.php');
            } 
        }
    }
?>