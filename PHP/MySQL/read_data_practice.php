<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
        die('Error: '. $e->getMessage());
    }

    // $response = $db->query ("SELECT * FROM video_games WHERE owner = ? AND price <= ? ORDER BY price DESC LIMIT 3, 10");
    // while ($data = $response->fetch()) {
    //     echo '<p>'.$data['name'].'<p>';
    // }

    // $_GET['owner'] = 'Florian';
    // $_GET['price_max'] = 40;

    // $response = $db->prepare("SELECT * FROM video_games WHERE owner = :owner AND price <= :maxprice ORDER BY price DESC");
    // $response->execute(array('owner' => $_GET['owner'], 'maxprice' => $_GET['price_max']));
    // while ($data = $response->fetch()) {
    //     echo '<p>'.$data['name'].'<p>';
    // }

    // QUESTION 1 //
    echo '<br>QUESTION 1</br>';

    $response = $db->query("SELECT * FROM video_games WHERE owner='John'");
    while ($data = $response->fetch()) {
        echo '<li>'.$data['name']. ' ('. $data['price']. ' dollars) </li>' ;
    }

    $response->closeCursor();

    // QUESTION 2 //
    echo '<br>QUESTION 2</br>';

    $response = $db->query("SELECT * FROM video_games WHERE nb_players_max=1");
    while ($data = $response->fetch()) {
        echo '<li>'.$data['name'].' '.$data['owner']. ' ('. $data['nb_players_max']. ' player) </li>' ;
    }

    $response->closeCursor();

    // QUESTION 3 //
    echo '<br>QUESTION 3</br>';

    $response = $db->query("SELECT * FROM video_games WHERE console='PC'");
    while ($data = $response->fetch()) {
        echo '<li>'.$data['name'].' '.$data['owner'].'</li>' ;
    }

    $response->closeCursor();

    // QUESTION 4 //
    echo '<br>QUESTION 4</br>';

    $response = $db->query("SELECT * FROM video_games WHERE name='SSX 3' OR name='Tetris'");
    while ($data = $response->fetch()) {
        echo '<li>'.$data['name'].' '.$data['owner'].'</li>' ;
    }

    $response->closeCursor();
    
    // QUESTION 5 //
    echo '<br>QUESTION 5</br>';

    $response = $db->query("SELECT * FROM video_games WHERE price=25");
    while ($data = $response->fetch()) {
        echo '<li>'.$data['name'].' '.$data['owner'].'</li>' ;
    }

    $response->closeCursor();

    // QUESTION 6 // 
    echo '<br>QUESTION 6</br>';

    $response = $db->query("SELECT * FROM video_games ORDER BY nb_players_max ASC");
    while ($data = $response->fetch()) {
    echo '<li>'.$data['name'].'</br>'.' nb player: '.$data['nb_players_max']. ' ('.$data['price']. ' dollars)</li>';
    }
    $response->closeCursor();

    // QUESTION 7 //
    echo '<br>QUESTION 7</br>';

    $response = $db->query("SELECT * FROM video_games WHERE owner='Florian' LIMIT 0, 5");
    while ($data = $response->fetch()) {
    echo '<li>'.$data['name']. ' ('.$data['price']. ' dollars)</li>';
    }

    $response->closeCursor();

    // QUESTION 8 //
    echo '<br>QUESTION 8</br>';

    $response = $db->query("SELECT * FROM video_games WHERE owner='John' AND price<40 ORDER BY price DESC");
    while ($data = $response->fetch()) {
        echo '<li>'.$data['name']. ' ('.$data['price']. ' dollars)</li>';
    }


    // QUESTION 9 //
    echo '<br>QUESTION 9</br>';

    $owner = 'John';
    $response = $db->prepare("SELECT * FROM video_games WHERE owner=?");
    $response->execute(array($owner));
    while ($data = $response->fetch()) {
        echo '<li>'.$data['name']. ' ('. $data['price']. ' dollars) </li>' ;
    }

    $response->closeCursor();

    $nb_players = 1;
    $response = $db->prepare("SELECT * FROM video_games WHERE nb_players_max=?");
    $response->execute(array($nb_players));
    while ($data = $response->fetch()) {
        echo '<li>'.$data['name'].' '.$data['owner']. ' ('. $data['nb_players_max']. ' player) </li>' ;
    }

    $response->closeCursor();

    $console = 'PC';
    $response = $db->prepare("SELECT * FROM video_games WHERE console=?");
    $response->execute(array($console));
    while ($data = $response->fetch()) {
        echo '<li>'.$data['name'].' '.$data['owner'].'</li>' ;
    }

    $response->closeCursor();

    $name1 = 'SSX 3';
    $name2 = 'Tetris';
    $response = $db->prepare("SELECT * FROM video_games WHERE name=? OR name=?");
    $response->execute(array($name1, $name2));
    while ($data = $response->fetch()) {
        echo '<li>'.$data['name'].' '.$data['owner'].'</li>' ;
    }

    $response->closeCursor();

    $price = 25;
    $response = $db->prepare("SELECT * FROM video_games WHERE price=?");
    $response->execute(array($price));
    while ($data = $response->fetch()) {
        echo '<li>'.$data['name'].' '.$data['owner'].'</li>' ;
    }

    $response->closeCursor();

    $owner = 'Florian';
    $response = $db->prepare("SELECT * FROM video_games WHERE owner=? LIMIT 0, 5");
    $response->execute(array($owner));
    while ($data = $response->fetch()) {
    echo '<li>'.$data['name']. ' ('.$data['price']. ' dollars)</li>';
    }

    $response->closeCursor();

    $owner = 'John';
    $price = 40; 
    $response = $db->prepare("SELECT * FROM video_games WHERE owner=? AND price<? ORDER BY price DESC");
    $response->execute(array($owner, $price));
    while ($data = $response->fetch()) {
        echo '<li>'.$data['name']. ' ('.$data['price']. ' dollars)</li>';
    }


    // QUESTION 10 //
    echo '<br>QUESTION 10</br>';

    $owner = 'John';
    $response = $db->prepare("SELECT * FROM video_games WHERE owner=:owner");
    $response->execute(array('owner' => $owner));
    while ($data = $response->fetch()) {
        echo '<li>'.$data['name']. ' ('. $data['price']. ' dollars) </li>' ;
    }

    $response->closeCursor();

    $nb_players = 1;
    $response = $db->prepare("SELECT * FROM video_games WHERE nb_players_max=:nb_players");
    $response->execute(array('nb_players' => $nb_players));
    while ($data = $response->fetch()) {
        echo '<li>'.$data['name'].' '.$data['owner']. ' ('. $data['nb_players_max']. ' player) </li>' ;
    }

    $response->closeCursor();

    $console = 'PC';
    $response = $db->prepare("SELECT * FROM video_games WHERE console=?");
    $response->execute(array($console));
    while ($data = $response->fetch()) {
        echo '<li>'.$data['name'].' '.$data['owner'].'</li>' ;
    }

    $response->closeCursor();

    $name1 = 'SSX 3';
    $name2 = 'Tetris';
    $response = $db->prepare("SELECT * FROM video_games WHERE name=:name1 OR name=:name2");
    $response->execute(array('name1' => $name1, 'name2' => $name2));
    while ($data = $response->fetch()) {
        echo '<li>'.$data['name'].' '.$data['owner'].'</li>' ;
    }

    $response->closeCursor();

    $price = 25;
    $response = $db->prepare("SELECT * FROM video_games WHERE price=:price");
    $response->execute(array('price' => $price));
    while ($data = $response->fetch()) {
        echo '<li>'.$data['name'].' '.$data['owner'].'</li>' ;
    }

    $response->closeCursor();

    $owner = 'Florian';
    $response = $db->prepare("SELECT * FROM video_games WHERE owner=:owner LIMIT 0, 5");
    $response->execute(array('owner' => $owner));
    while ($data = $response->fetch()) {
    echo '<li>'.$data['name']. ' ('.$data['price']. ' dollars)</li>';
    }

    $response->closeCursor();

    $owner = 'John';
    $price = 40; 
    $response = $db->prepare("SELECT * FROM video_games WHERE owner=:owner AND price<:price ORDER BY price DESC");
    $response->execute(array('owner' => $owner, 'price' => $price));
    while ($data = $response->fetch()) {
        echo '<li>'.$data['name']. ' ('.$data['price']. ' dollars)</li>';
    }
?>