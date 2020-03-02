<?php    
    try {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
        die('Error: '. $e->getMessage());
    }

    if (isset($_POST['currentMsgCount'])) {
        $messagecount = $_POST['currentMsgCount'] + 10;
    } else {
        $messagecount = 10;
    }

    $totalMessages =  $db->query("SELECT COUNT(ID) as msg_count FROM minichat");
    $totalMessagescount = $totalMessages->fetch()['msg_count'];

    $startPosition = $totalMessagescount - $messagecount;

    if ($startPosition > 0) {
        $convo = $db->query("SELECT * FROM minichat ORDER BY ID LIMIT $startPosition, $messagecount");
        while ($data = $convo->fetch()) {
                echo '<li>'. $data['pseudo']. ': '. $data['message']. '</li>';                                             
        } 
        $convo->closeCursor();
    } else {
        $convo = $db->query("SELECT * FROM minichat ORDER BY ID LIMIT 0, $messagecount");
        while ($data = $convo->fetch()) {
                echo '<li>'. $data['pseudo']. ': '. $data['message']. '</li>';                                             
        } 
        $convo->closeCursor();          
    }
?>