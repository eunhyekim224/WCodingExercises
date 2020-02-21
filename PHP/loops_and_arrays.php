<!-- QUESTION 1 -->

<?php 
    $ages = array (12, 23, 30, 56, 140);
    //or
    $ages[0] = 12;
    $ages[1] = 23;
    $ages[2] = 30;
    $ages[3] = 56;
    $ages[4] = 140;
    // or
    $ages[] = 12;
    $ages[] = 23;
    $ages[] = 30;
    $ages[] = 56;
    $ages[] = 140;
?>

<!-- QUESTION 2 -->

<?php 
    $group1 = array (
        'language' => 'French',
        'day_class' => 'Monday',
        'is_already_started' => true,
        'nb_of_students' => 15);
    echo $group1['language'];

    // or

    $group2['language'] = 'English';
    $group2['day_class'] = 'Tuesday';
    $group2['is_already_started'] = false;
    $group2['nb_of_students'] = 8;
    echo $group2['is_already_started'];
    
?>

<!-- QUESTION 3 -->

<?php
    $colors = array('blue', 'red', 'pink', 'green', 'white', 'orange', 'black', 'purple', 'yellow', 'grey');
    for($i=0; $i<count($colors); $i++) {
        echo $colors[$i] . ' ';
    }
?>

<!-- QUESTION 4 -->

<?php
    foreach($colors as $color) {
        echo $color . ' ';
    }
?>

<!-- QUESTION 5 -->

<?php
    $coords = array(
        array('x' => 1, 'y' => 4,'z' => 6),
        array('x' => 4, 'y' => 8,'z' => 0),
        array('x' => 6, 'y' => 56,'z' => 12),
        array('x' => 12, 'y' => 23,'z' => 3),
        array('x' => 15, 'y' => 8,'z' => 67),
        array('x' => 2, 'y' => 4,'z' => 2),
        array('x' => 3, 'y' => 9,'z' => 8),
        array('x' => 7, 'y' => 12,'z' => 32),
        array('x' => 8, 'y' => 34,'z' => 1),
        array('x' => 2, 'y' => 0,'z' => 5)
    );
      
    // foreach($coords as $coordinateArray) {
    //     foreach($coordinateArray as $key => $coordinates) {
    //         echo $key .' : '. $coordinates . ', ';
    //     }
    // }

    //OR

    foreach($coords as $key => $coordinate) {
        echo '</br>x : ' .$coordinate['x'].'</br>y : '. $coordinate['y']. '</br>z : '. $coordinate['z']; 
    }
?>

<!-- QUESTION 6 -->

<?php
    // array_key_exists

    if (array_key_exists(2, $colors) OR array_key_exists(12, $colors)) {
        echo 'The key 2 or 12 exists! <br>'; 
    }
    
    if (array_key_exists('x', $coords[1]) OR array_key_exists('k', $coords[1])) {
        echo 'The key x or k exists! <br>';
    }

    // in_array

    if (in_array('white', $colors)) {
        echo 'The color white exists!';
    } elseif (in_array('maroon', $colors)) {
        echo 'The color maroon exists! <br>';
    }

    foreach($coords as $key => $coordinate) {
        if (in_array(4, $coordinate) AND $coordinate['x']===4) {
            echo 'x:4 exists </br>';
        } else if (in_array(6, $coordinate) AND $coordinate['x']===6 AND in_array(12, $coordinate) AND $coordinate['z']===12) {
            echo 'The coordinates z:12 and x:6 both exist! <br>';
        } else if (in_array(25, $coordinate) AND $coordinate['y']===25) {
            echo 'The coordiantes y:25 exists! <br>';
        }
    }

    // array_search

    $position1 = array_search('white', $colors);
    if ($position1) {
        echo 'The colour white is found in position: ' .$position1 .'<br>';
    }

    $position2 = array_search('maroon', $colors);
    if ($position2) {
        echo 'The colour maroon is found in position: ' .$position2 .'<br>';
    }

    $key1 = array_search(4, $coords[1]);
    if ($key1=='x') {
        echo 'The coordinate x:4 exists <br>';
    }

    $key2 = array_search(12, $coords[1]);
    $key3 = array_search(6, $coords[1]);
    if ($key2=='z' AND $key3=='x') {
        echo 'The coordinates x:6 and z:12 exist <br>';
    }

    $key4 = array_search(25, $coords[1]);
    if ($key4=='y') {
        echo 'The coordinate y:25 exists <br>';
    }
?>
