<?php
session_start();

try {
    $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch(Exception $e) {
    die('Error: '. $e->getMessage());
}

$login = isset($_POST['login']) ? addslashes(htmlspecialchars(htmlentities(trim($_POST['login'])))) : '';
$password = isset($_POST['password']) ? addslashes(htmlspecialchars(htmlentities(trim($_POST['password'])))) : ''; 
$remember_login = isset($_POST['remember_login']) ? $_POST['remember_login'] : '';

verify($db, $login, $password);
remember_login($login, $password, $remember_login);
echo $_COOKIE['member_login'];
echo $_COOKIE['member_pw'];

function verify($db, $login, $password) {
    $getDetails = $db->query("SELECT ID, login, password FROM members_area");
    while ($member = $getDetails->fetch()) {
        $member_login = $member['login'];
        $member_pw = $member['password'];
        $member_id = $member['ID'];

        if (password_verify($password, $member_pw) AND $login===$member_login) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $member_id;
            header('Location: minichat_member.php');
        }          
    }
    echo 'The username or password you have entered is invalid.';
}

function remember_login($login, $password, $remember_login) {
    if ($remember_login = 'remember') {
        setcookie('member_login', $login, time() + 360*24*3600, null, null, false, true);
        setcookie('member_pw', $password, time() + 360*24*3600, null, null, false, true);
    }
}

include('connection_page.php');
?>