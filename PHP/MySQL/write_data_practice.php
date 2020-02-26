<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
        die('Error: '. $e->getMessage());
    }

    // QUESTION 1 //

    $queryAdd = "INSERT INTO video_games(name, owner, console, price, nb_players_max, comments) VALUES('Oblivion', 'John', 'Xbox', 35, 1, 'Great Role game')";

    $responseAdd = $db->exec($queryAdd);

    // QUESTION 2 // 

    $name = 'Call of duty';
    $owner = 'Franck';
    $console = 'PC';
    $price = 25;
    $nb_players = 2;
    $comment = 'Multiplayer shooting game';

    $response = $db->prepare("INSERT INTO video_games(name, owner, console, price, nb_players_max, comments) VALUES(:name, :owner, :console, :price, :nb_players, :comment)");
    $response->execute(array(
        'name' => $name,
        'owner' => $owner,
        'console' => $console,
        'price' => $price,
        'nb_players' => $nb_players,
        'comment' => $comment,
    ));

    // QUESTION 3 //

    $responseUpdate = $db->exec("UPDATE video_games SET price=30 WHERE name='Oblivion'");

    // QUESTION 4 //

    $comment = 'Best game ever for me!';
    $secondUpdate = $db->prepare("UPDATE video_games SET comments=:comment WHERE name='Call of duty'");
    $secondUpdate->execute(array(
        'comment' => $comment
    )); 

    // QUESTION 5 //

    $deleteGame = $db->exec("DELETE FROM video_games WHERE name='Oblivion'");


    $responseAll = $db->query ("SELECT * FROM video_games");
    while ($data = $responseAll->fetch()) {
        echo '<p>'.$data['name']. ' '. $data['price']. ' dollors'. ' comment: '.$data['comments'].'<p>';
    }



?>
