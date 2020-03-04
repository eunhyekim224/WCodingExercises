<?php
    if (isset($_COOKIE['login']) AND isset($_COOKIE['pw'])) {
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

            if ($member['login'] === $_COOKIE['login'] AND password_verify($_COOKIE['pw'], $member['password'])) {
                header('Location: minichat_member.php');
            }
        }

        // while ($member = $getDetails->fetch()) {
        //     $member_login = $member['login'];
        //     $member_pw = $member['password'];

        //     $cookieLogin = isset($_COOKIE['login']) ? $_COOKIE['login'] : '';
        //     $cookiePw = isset($_COOKIE['pw']) ? $_COOKIE['pw'] : '';

        //     if (password_verify($cookiePw, $member_pw) AND $cookieLogin===$member_login) {              
        //         header('Location: minichat_member.php');
        //     }
        // }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Log in</title>
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
            <form method="post" action="connection.php">
                <p>
                    <label for="login">Login: </label>
                    <input type="text" name="login">
                </p>  
                <p>
                    <label for="password">Password: </label>
                    <input type="password" name="password">
                </p> 
                <p>
                    <label for="remember_login">Remember login</label>
                    <input type="radio" name="remember_login" value="remember">
                </p>
                <p>
                    <input type="submit" name="logIn" value="Log in">
                </p>
            </form>
            <p>
                <button><a href="http://localhost:8080/sites/sql_practice/member_area/index.php">Sign up</a></button>
            </p>
        </div>
    </body>
</html>