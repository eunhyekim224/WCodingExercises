<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=james_minichat;charset=utf8', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
        die('Error: '. $e->getMessage());
    }

    $login = isset($_POST['login']) ? addslashes(htmlspecialchars(htmlentities(trim($_POST['login'])))) : '';
    $email = isset($_POST['email']) ? addslashes(htmlspecialchars(htmlentities(trim($_POST['email'])))) : '';
    $password = isset($_POST['password']) ? addslashes(htmlspecialchars(htmlentities(trim($_POST['password'])))) : ''; 
    $confirm_pw = isset($_POST['confirm_pw']) ? addslashes(htmlspecialchars(htmlentities(trim($_POST['confirm_pw'])))) : ''; 

    $checkForm = checkFormComplete($login, $email, $password, $confirm_pw);
    $checkLogin = checkLoginExists($db, $login);
    $confirmPw = confirmPw($password, $confirm_pw);

    addMemberInfo($db, $login, $password, $email, $checkForm, $checkLogin, $confirmPw);
    addMemberID($db);

    function addMemberInfo($db, $login, $password, $email, $checkForm, $checkLogin, $confirmPw) {
        if ($checkForm AND $checkLogin AND $confirmPw) {
            $addMember = $db->prepare("INSERT INTO members_area(login, password, email, registration_date) VALUES(:login, :password, :email, NOW())");
            $addMember->execute(array(
                'login' => $login,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'email' => $email,
            ));
            header('Location: connection_page.php');
        }
    } 

    function checkFormComplete($login, $email, $password, $confirm_pw) {
        if (empty($login) OR empty($email) OR empty($password) OR empty($confirm_pw)) {
            echo 'Please complete the form fully.</br>';
        } else {
            return true;
        }
    }

    function checkLoginExists($db, $login) {
        $getLogins = $db->query("SELECT login FROM members_area");
        $allLogins = $getLogins->fetchAll();

        foreach ($allLogins as $key => $value) {
            if ($value['login'] === $login) {
                echo 'The login name you entered has already been taken. Please choose another one.</br>';
            }
            else {
                return true;
            }
        }
    }

    function confirmPw($password, $confirm_pw) {
        if ($password !== $confirm_pw) {
            echo 'You\'ve failed to confirm your password. Please re-enter.</br>';
        } else {
            return true;
        }   
    }

    try {
        $db = new PDO('mysql:host=localhost;dbname=james_minichat;charset=utf8', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
        die('Error: '. $e->getMessage());
    }

    function addMemberID($db) {
        $member_details = $db->query("SELECT id, login FROM members_area");
        while ($member = $member_details->fetch()) {
            $member_login = $member['login'];
            $member_id = $member['id'];
            $update = $db->prepare("UPDATE minichat SET member_id=? WHERE pseudo=?");
            $update->execute(array($member_id, $member_login));
        }
    }

    

    include('index.php');
?>