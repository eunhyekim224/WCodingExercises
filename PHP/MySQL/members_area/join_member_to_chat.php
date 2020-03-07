<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=james_minichat;charset=utf8', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
        die('Error: '. $e->getMessage());
    }

    $member_details = $db->query("SELECT id, login FROM members_area");
        while ($member = $member_details->fetch()) {
            $member_login = $member['login'];
            $member_id = $member['id'];
            $update = $db->prepare("UPDATE minichat SET member_id=? WHERE pseudo=?");
            $update->execute(array($member_id, $member_login));
    }

    // $getLogin = $db->prepare("SELECT mem.login AS member_login, mini.message AS member_msg
    //                             FROM members_area mem
    //                             JOIN minichat mini
    //                             ON mem.login = mini.member_id
    //                             WHERE mem.login = ?")
    // $getLogin->execute($_POST['member_login']);
    // echo $result = $getLogin->fetch();
?>



    
