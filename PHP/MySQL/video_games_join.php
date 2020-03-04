<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
        die('Error: '. $e->getMessage());
    }

    // UPDATE VIDEO GAMES WITH FOREIGN KEYS

    // $owner_details = $db->query("SELECT id, owner FROM video_games");
    // while ($owner = $owner_details->fetch()) {
    //     $owner_name = $owner['owner'];
    //     $owner_id = $owner['id'];
    //     $update = $db->prepare("UPDATE video_games SET owner_id=? WHERE owner=?");
    //     $update->execute(array($owner_id, $owner_name));
    // }

    // $update_florian = $db->exec("UPDATE video_games SET owner_id=1 WHERE owner='Florian'");
    // $update_john = $db->exec("UPDATE video_games SET owner_id=2 WHERE owner='John'");
    // $update_mathieu = $db->exec("UPDATE video_games SET owner_id=3 WHERE owner='Mathieu'");
    // $update_franck = $db->exec("UPDATE video_games SET owner_id=4 WHERE owner='Franck'");
    // $update_corentin = $db->exec("UPDATE video_games SET owner_id=5 WHERE owner='Corentin'");
    // $update_roman = $db->exec("UPDATE video_games SET owner_id=6 WHERE owner='Roman'");

    // $delete_michel = $db->exec("DELETE FROM video_games WHERE owner_id=0");
    
    // QUESTION 1: JOIN with different clauses //

    echo '<br><strong>With WHERE</strong><br>';
    $join_where = $db->query("SELECT v.name AS game_names, o.firstName AS owner_name
                                FROM video_games v, owners o
                                WHERE v.owner_id = o.id");
    while ($game = $join_where->fetch()) {
        echo $game['owner_name']."'s ".$game['game_names']."</br>";
    } 

    echo '<br><strong>With INNER JOIN</strong><br>';
    $join_inner = $db->query("SELECT v.name AS game_names, o.firstName AS owner_name
                                FROM video_games v 
                                JOIN owners o
                                ON v.owner_id = o.id");
    while ($game = $join_inner->fetch()) {
    echo $game['owner_name']."'s ".$game['game_names']."</br>";
    } 

    echo '<br><strong>With LEFT JOIN</strong><br>';
    $join_left = $db->query("SELECT v.name AS game_names, o.firstName AS owner_name
                                FROM video_games v 
                                LEFT JOIN owners o
                                ON v.owner_id = o.id");
    while ($game = $join_left->fetch()) {
    echo $game['owner_name']."'s ".$game['game_names']."</br>";
    }
    
    echo '<br><strong>With RIGHT JOIN</strong><br>';
    $join_right = $db->query("SELECT v.name AS game_names, o.firstName AS owner_name
                                FROM video_games v 
                                RIGHT JOIN owners o
                                ON v.owner_id = o.id");
    while ($game = $join_right->fetch()) {
    echo $game['owner_name']."'s ".$game['game_names']."</br>";
    } 

    // QUESTION 2: Create table with PHP query //

    $create_table = $db->exec("CREATE TABLE IF NOT EXISTS consoles (
                                console_id INT AUTO_INCREMENT,
                                name VARCHAR(255) NOT NULL,
                                PRIMARY KEY (console_id)
                                ) ENGINE=INNODB;");

    // ADD CONSOLE_ID FIELD IN VIDEO GAMES

    // $add_field = $db->exec("ALTER TABLE `video_games` ADD `console_id` INT(11) NOT NULL AFTER `owner_id`");

    // UPDATE CONSOLE NAME WITH FOREIGN KEYS

    //     $console_details = $db->query("SELECT id, console FROM video_games");
    //     while ($console = $console_details->fetch()) {
    //     $console_name = $console['console'];
    //     $console_id = $console['id'];
    //     $update = $db->prepare("UPDATE video_games SET console_id=? WHERE console=?");
    //     $update->execute(array($console_id, $console_name));
    // }

    // $update_NES = $db->exec("UPDATE video_games SET console_id=1 WHERE console='NES'");
    // $update_Megadrive = $db->exec("UPDATE video_games SET console_id=2 WHERE console='Megadrive'");
    // $update_Nintendo64 = $db->exec("UPDATE video_games SET console_id=3 WHERE console='Nintendo 64'");
    // $update_gameCube = $db->exec("UPDATE video_games SET console_id=4 WHERE console='GameCube'");
    // $update_xbox = $db->exec("UPDATE video_games SET console_id=5 WHERE console='Xbox'");
    // $update_pc= $db->exec("UPDATE video_games SET console_id=6 WHERE console='PC'");
    // $update_superNES= $db->exec("UPDATE video_games SET console_id=7 WHERE console='superNES'");
    // $update_PS2= $db->exec("UPDATE video_games SET console_id=8 WHERE console='PS2'");
    // $update_GBA= $db->exec("UPDATE video_games SET console_id=9 WHERE console='GBA'");
    // $update_PS= $db->exec("UPDATE video_games SET console_id=10 WHERE console='PS'");
    // $update_gameboy= $db->exec("UPDATE video_games SET console_id=11 WHERE console='Gameboy'");
    // $update_dreamcast= $db->exec("UPDATE video_games SET console_id=12 WHERE console='Dreamcast'");

    // SUPPRESS console field

    // $sup_console = $db->exec("ALTER TABLE video_games DROP console");

    // ADD new game with console_id = null 

    // $add_game = $db->exec("INSERT INTO video_games(name, owner_id, console_id, price, nb_players_max, comments) VALUES('Find Eunhye', 1, 0, 20, 4, 'Warning: super hard game!')");

    // STEP 3 QUESTION 1: display every game's names with type of console WITH WHERE CLAUSE

    echo '<br><strong>With WHERE</strong><br>';
    $name_console = $db->query("SELECT v.name AS game_name, c.name AS console_name
                                FROM video_games v, consoles c
                                WHERE c.console_id = v.console_id");
    while ($game = $name_console->fetch()) {
        echo '</br>'.$game['game_name'].'-'.$game['console_name'].'</br>';
    }

    // QUESTION 2: with INNER JOIN
    echo '<br><strong>With INNER JOIN</strong><br>';
    $name_console = $db->query("SELECT v.name AS game_name, c.name AS console_name
                                FROM video_games v
                                JOIN consoles c
                                ON c.console_id = v.console_id");
    while ($game = $name_console->fetch()) {
        echo '</br>'.$game['game_name'].'-'.$game['console_name'].'</br>';
    }

     // QUESTION 3: with LEFT JOIN
     echo '<br><strong>With LEFT JOIN</strong><br>';
     $name_console = $db->query("SELECT v.name AS game_name, c.name AS console_name
                                 FROM consoles c
                                 LEFT JOIN video_games v
                                 ON c.console_id = v.console_id");
     while ($game = $name_console->fetch()) {
         echo '</br>'.$game['game_name'].'-'.$game['console_name'].'</br>';
     }

    // QUESTION 3: with RIGHT JOIN
    echo '<br><strong>With RIGHT JOIN</strong><br>';
    $name_console = $db->query("SELECT v.name AS game_name, c.name AS console_name
                                FROM consoles c
                                RIGHT JOIN video_games v
                                ON c.console_id = v.console_id");
    while ($game = $name_console->fetch()) {
        echo '</br>'.$game['game_name'].'-'.$game['console_name'].'</br>';
    }
     




?>