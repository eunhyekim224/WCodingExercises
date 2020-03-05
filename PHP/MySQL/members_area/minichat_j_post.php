<?php
session_start();

try {
    $db = new PDO('mysql:host=localhost;dbname=james_minichat;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e){
        die("error : " .$e->getMessage());
    }


 $pseudo = isset($_POST['pseudo'])?$_POST['pseudo']:'';
 $message = isset($_POST['message'])?$_POST['message']:'';


    $response = $db->prepare("INSERT into minichat(pseudo,message) VALUES(:pseudo, :message)");
    $response->bindParam(':pseudo',$pseudo,PDO::PARAM_STR);
    $response->bindParam(':message',$message,PDO::PARAM_STR);
    $response->execute();

    setcookie("pseudo",$pseudo,time()+ 365*24*3600, null ,null ,false, true);


 header('Location: minichat_member.php');


?>