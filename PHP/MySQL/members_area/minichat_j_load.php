<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=james_minichat;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch(Exception $e){
            die("error : " .$e->getMessage());
        }

    $max = isset($_GET['range'])?$_GET['range']:'10';

    if($max !='all'){
        // $query = "SELECT pseudo,message FROM minichat ORDER BY ID DESC LIMIT 0,$max";
        $query = "SELECT mem.login AS member_login, mini.message AS member_msg
                    FROM members_area mem
                    RIGHT JOIN minichat mini
                    ON mem.login = mini.member_id
                    ORDER BY mini.ID DESC LIMIT 0,$max";
    } else {
        // $query = "SELECT pseudo,message FROM minichat ORDER BY ID DESC";
        $query = "SELECT mem.login AS member_login, mini.message AS member_msg
                    FROM members_area mem
                    RIGHT JOIN minichat mini
                    ON mem.login = mini.member_id
                    ORDER BY mini.ID DESC";
    } 

    $req = $db->query($query);
    while($data = $req->fetch()){
        echo '<b>' .$data['member_login'] .'</b>: ' .$data['member_msg'] .'<br />'; 
    }
  
?>