<?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Error: '. $e->getMessage());
    }

    echo '<br>QUESTION 1</br>';
    $response = $db->query("SELECT UPPER(name) AS name_max, UPPER(console) AS console_max FROM video_games");
    while ($data = $response->fetch()) {
        echo '<li>'. $data['name_max']. ' '. $data['console_max'].'</li>'; 
    }

    echo '<br>QUESTION 2</br>';
    $response = $db->query("SELECT UPPER(name) AS name_max, UPPER(console) AS console_max, LOWER(owner) AS owner_max FROM video_games");
    while ($data = $response->fetch()) {
        echo '<li>'. $data['name_max']. ' '. $data['console_max']. ' '. $data['owner_max'].'</li>'; 
    }

    echo '<br>QUESTION 3</br>';
    $response = $db->query("SELECT name, LENGTH(comments) AS comment_len FROM video_games");
    while ($data = $response->fetch()) {
        echo '<li>'. $data['name']. ' '. $data['comment_len'].'</li>'; 
    }
    
    echo '<br>QUESTION 4</br>';
    $response = $db->query("SELECT AVG(nb_players_max) AS nb_players_avg, owner FROM video_games WHERE owner='Florian' GROUP BY owner");
    while ($data = $response->fetch()) {
        echo '<li>'. $data['owner']. ' '. $data['nb_players_avg'].'</li>'; 
    }

    echo '<br>QUESTION 5</br>';
    $response = $db->query("SELECT SUM(price) AS total_price FROM video_games WHERE owner='Florian' OR owner='John'");
    while ($data = $response->fetch()) {
        echo '<li>'. $data['total_price'].'</li>'; 
    }
    
    echo '<br>QUESTION 6</br>';
    $response = $db->query("SELECT MAX(price) AS max_price FROM video_games WHERE owner='John'");
    while ($data = $response->fetch()) {
        echo '<li>'. $data['max_price'].'</li>'; 
    }

    echo '<br>QUESTION 7</br>';
    $response = $db->query("SELECT MIN(price) AS min_price FROM video_games WHERE owner='Florian'");
    while ($data = $response->fetch()) {
        echo '<li>'. $data['min_price'].'</li>'; 
    }

    echo '<br>QUESTION 8</br>';
    $response = $db->query("SELECT COUNT(name) AS games_count, owner FROM video_games WHERE owner='Florian' OR owner='John' GROUP BY owner");
    while ($data = $response->fetch()) {
        echo '<li>'. $data['owner'].' '. $data['games_count'].'</li>'; 
    }

    echo '<br>QUESTION 9</br>';
    $response = $db->query("SELECT COUNT(name) AS games_count, owner FROM video_games GROUP BY owner");
    while ($data = $response->fetch()) {
        echo '<li>'. $data['owner'].' '. $data['games_count'].'</li>'; 
    }

    echo '<br>QUESTION 10</br>';
    $response = $db->query("SELECT COUNT(console) AS console_count, console FROM video_games GROUP BY console");
    while ($data = $response->fetch()) {
        echo '<li>'. $data['console'].' '. $data['console_count'].'</li>'; 
    }

    echo '<br>QUESTION 11</br>';
    $response = $db->query("SELECT AVG(price) AS price_avg, console, COUNT(console) as console_count FROM video_games WHERE price<25 GROUP BY console");
    while ($data = $response->fetch()) {
        echo '<li>'. $data['console'].' '. $data['price_avg']. ' '. $data['console_count'].'</li>'; 
    }

    echo '<br>QUESTION 12</br>';
    $response = $db->query("SELECT ROUND(AVG(price),2) AS price_avg, console, COUNT(console) as console_count FROM video_games WHERE price<25 GROUP BY console");
    while ($data = $response->fetch()) {
        echo '<li>'. $data['console'].' '. $data['price_avg']. ' '. $data['console_count'].'</li>'; 
    }

    echo '<br>QUESTION 13</br>';
    $response = $db->query("SELECT AVG(price) AS price_avg, console FROM video_games GROUP BY console HAVING price_avg>30");
    while ($data = $response->fetch()) {
        echo '<li>'. $data['console'].' '. $data['price_avg'].'</li>'; 
    }

    echo '<br>QUESTION 14</br>';
    $response = $db->query("SELECT COUNT(console) AS nb_console, console FROM video_games WHERE nb_players_max > 1 GROUP BY console HAVING nb_console>3");
    while ($data = $response->fetch()) {
        echo '<li>'. $data['console'].' '. $data['nb_console'].'</li>'; 
    }


?>
