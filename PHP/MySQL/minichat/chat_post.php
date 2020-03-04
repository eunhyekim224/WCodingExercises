<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
        die('Error: '. $e->getMessage());
    }
                
    if ($_POST['pseudo'] !== '' AND $_POST['message'] !== '') {
        $response = $db->prepare("INSERT INTO minichat(pseudo, message, date_creation) VALUES(:pseudo, :message, :date_creation)");
        $response->execute(array(
            'pseudo' => htmlspecialchars($_POST['pseudo']),
            'message' =>  htmlspecialchars($_POST['message']),
            'date_creation' => date('y-m-d H:i:s')
        ));
        $response->closeCursor();

        setcookie('pseudo', $_POST['pseudo']);
    }
        header('Location: chat.php');    
  
?>
