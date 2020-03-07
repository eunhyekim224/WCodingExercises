<?php
session_start();

try {
    $db = new PDO('mysql:host=localhost;dbname=james_minichat;charset=utf8', 'root', '',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch(Exception $e) {
    die('Error: '. $e->getMessage());
}

$login = isset($_POST['login']) ? addslashes(htmlspecialchars(htmlentities(trim($_POST['login'])))) : '';
$password = isset($_POST['password']) ? addslashes(htmlspecialchars(htmlentities(trim($_POST['password'])))) : ''; 
$remember_login = isset($_POST['remember_login']) ? $_POST['remember_login'] : '';


verify($db, $login, $password, $remember_login);
// if (!isset($_COOKIE['member_login']) AND !isset($_COOKIE['member_pw'])) {
//     verify($db, $login, $password, $remember_login);
// }

function verify($db, $login, $password, $remember_login) {
    $getDetails = $db->query("SELECT ID, login, password FROM members_area");
    while ($member = $getDetails->fetch()) {
        $member_login = $member['login'];
        $member_pw = $member['password'];
        $member_id = $member['ID'];

        if (password_verify($password, $member_pw) AND $login===$member_login) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $member_id;
            remember_login($db, $login, $remember_login, $member_id);
            header('Location: minichat_member.php');
        }
    }
    echo 'The username or password you have entered is invalid.';
}
   

function remember_login($db, $login, $remember_login, $id) {
    if ($remember_login = 'remember') {

        $getInfo = $db->query("SELECT login, password FROM members_area");
        while ($info = $getInfo->fetch()) {
            if ($info['login'] = $login) {
                $password = $info['password'];
            }
        }
        setcookie('member_login', $login, time() + 360*24*3600, null, null, false, true);
        setcookie('member_pw', $password, time() + 360*24*3600, null, null, false, true);
        setcookie('member_id', $id, time() + 360*24*3600, null, null, false, true);
    } 
}

include('connection_page.php');
?>